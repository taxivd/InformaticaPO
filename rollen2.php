<?php
class PrivilegedUser extends User
{
    private $roles;

    public function __construct() {
        parent::__construct();
    }

    // overschrijf de Gebruiker methode
    public static function getByUsername($leerlingNummer) {
        $sql = "SELECT * FROM Gebruiker WHERE leerlingNummer = :leerlingNummer";
        $sth = $GLOBALS["DB"]->prepare($sql);
        $sth->execute(array(":leerlingNummer" => $leerlingNummer));
        $result = $sth->fetchAll();

        if (!empty($result)) {
            $privUser = new PrivilegedUser();
            $privUser->leerlingNummer = $result[0]["leerlingNummer"];
            $privUser->leerlingNummer = $leerlingNummer;
            $privUser->wachtwoord = $result[0]["wachtwoord"];
            $privUser->initRoles();
            return $privUser;
        } else {
            return false;
        }
    }

    // Zet de rollen met hun bevoegdheden
    protected function initRoles() {
        $this->roles = array();
        $sql = "SELECT t1.role_id, t2.role_name FROM gebr_role as t1
                JOIN roles as t2 ON t1.role_id = t2.role_id
                WHERE t1.leerlingNummer = :leerlingNummer";
        $sth = $GLOBALS["DB"]->prepare($sql);
        $sth->execute(array(":leerlingNummer" => $this->leerlingNummer));

        while($row = $sth->fetch(PDO::FETCH_ASSOC)) {
            $this->roles[$row["role_name"]] = Role::getRolePerms($row["role_id"]);
        }
    }

    //Kijk of de gebruiker een specifiek privilege heeft
    public function hasPrivilege($perm) {
        foreach ($this->roles as $role) {
            if ($role->hasPerm($perm)) {
                return true;
            }
        }
        return false;
    }
	// check if a user has a specific role
	public function hasRole($role_name) {
		return isset($this->roles[$role_name]);
	}

	// insert a new role permission association
	public static function insertPerm($role_id, $perm_id) {
		$sql = "INSERT INTO role_perm (role_id, perm_id) VALUES (:role_id, :perm_id)";
		$sth = $GLOBALS["DB"]->prepare($sql);
		return $sth->execute(array(":role_id" => $role_id, ":perm_id" => $perm_id));
	}

	// delete ALL role permissions
	public static function deletePerms() {
		$sql = "TRUNCATE role_perm";
		$sth = $GLOBALS["DB"]->prepare($sql);
		return $sth->execute();
	}
}