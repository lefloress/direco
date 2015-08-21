<?php namespace Direco\Entities;

use Direco\Helpers\Estatus;
use Direco\Helpers\Role;
use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Usuario extends Model implements AuthenticatableContract, CanResetPasswordContract {

    use Authenticatable, CanResetPassword;

	protected $table = 'usuarios';
    protected $primaryKey = 'CEDULA_RIF';
    public $incrementing = false;
    public $timestamps = false;

    protected $fillable = array(
        'email', 'clave', 'cedula_rif', 'nombre',
        'direccion_fiscal1', 'direccion_fiscal2',
        'direccion_fiscal3', 'direccion_fiscal4', 'direccion_fiscal5',
        'telefono1', 'telefono2', 'celular',
        'estado', 'municipio', 'parroquia',
        'id_actividad_economica',
    );

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

    public function getIdAttribute()
    {
        return $this->getCedulaRifAttribute();
    }

    /**
     * Get the password for the user.
     *
     * @return string
     */
    public function getAuthPassword()
    {
        return $this->getClaveAttribute();
    }

    // DATOS PARA EL LOGIN

    /**
     * Email (usado para el login)
     */
    public function getEmailAttribute()
    {
        return $this->getAttributeFromArray('LOGIN');
    }

    public function setEmailAttribute($value)
    {
        $this->attributes['LOGIN'] = $value;
    }

    /**
     * Clave o password
     */
    public function getClaveAttribute()
    {
        return $this->getAttributeFromArray('PASS');
    }

    public function setClaveAttribute($value)
    {
        if ( ! empty ($value))
        {
            $this->attributes['PASS'] = \Hash::make($value);
        }
    }

    public function setRoleAttribute($value)
    {
        if ( ! in_array($value, Role::getList()))
        {
            new \Exception("Invalid role: $value");
        }

        $this->attributes['ROLE'] = $value;
    }

    public function getRoleAttribute()
    {
        return $this->getAttributeFromArray('ROLE');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    /**
     *
     * Estatus
     */
    public function getEstatusAttribute()
    {
        return $this->getAttributeFromArray('ESTATUS');
    }

    public function setEstatusAttribute($value)
    {
        if ( ! in_array($value, Estatus::getList()))
        {
            new \Exception("Invalid estatus: $value");
        }

        $this->attributes['ESTATUS'] = $value;
    }

    public function setConfirmationTokenAttribute($value)
    {
        $this->attributes['CONFTOKEN'] = $value;
    }

    public function getConfirmationTokenAttribute()
    {
        return $this->getAttributeFromArray('CONFTOKEN');
    }

    /**
     * Cedula o Rif del usuario
     */
    public function getCedulaRifAttribute()
    {
        return $this->getAttributeFromArray('CEDULA_RIF');
    }

    public function setCedulaRifAttribute($value)
    {
        $this->attributes['CEDULA_RIF'] = $value;
    }

    /**
     * Nombre
     */
    public function getNombreAttribute()
    {
        return $this->getAttributeFromArray('NOMBRE');
    }

    public function setNombreAttribute($value)
    {
        $this->attributes['NOMBRE'] = $value;
    }

    /**
     * Direccion fiscal 1
     * Avenida / Calle / Esquina / Carrera
     */
    public function getDireccionFiscal1Attribute()
    {
        return $this->getAttributeFromArray('DIR_FIS1');
    }

    public function setDireccionFiscal1Attribute($value)
    {
        $this->attributes['DIR_FIS1'] = $value;
    }

    /**
     * Direccion fiscal 2
     * Edificio / Residencia / Quinta / Local
     */
    public function getDireccionFiscal2Attribute()
    {
        return $this->getAttributeFromArray('DIR_FIS2');
    }

    public function setDireccionFiscal2Attribute($value)
    {
        $this->attributes['DIR_FIS2'] = $value;
    }

    /**
     * Direccion fiscal 3
     * Piso / Nivel / Apartamento / Oficina
     */
    public function getDireccionFiscal3Attribute()
    {
        return $this->getAttributeFromArray('DIR_FIS3');
    }

    public function setDireccionFiscal3Attribute($value)
    {
        $this->attributes['DIR_FIS3'] = $value;
    }

    /**
     * Direccion fiscal 4
     * Urbanización / Zona / Sector:
     */
    public function getDireccionFiscal4Attribute()
    {
        return $this->getAttributeFromArray('DIR_FIS4');
    }

    public function setDireccionFiscal4Attribute($value)
    {
        $this->attributes['DIR_FIS4'] = $value;
    }

    /**
     * Direccion fiscal 5
     * Punto de referencia
     */
    public function getDireccionFiscal5Attribute()
    {
        return $this->getAttributeFromArray('DIR_FIS5');
    }

    public function setDireccionFiscal5Attribute($value)
    {
        $this->attributes['DIR_FIS5'] = $value;
    }

    /**
     * Telefono 1
     */
    public function getTelefono1Attribute()
    {
        return $this->getAttributeFromArray('TELF1');
    }

    public function setTelefono1Attribute($value)
    {
        $this->attributes['TELF1'] = $value;
    }

    /**
     * Telefono 2
     */
    public function getTelefono2Attribute()
    {
        return $this->getAttributeFromArray('TELF2');
    }

    public function setTelefono2Attribute($value)
    {
        $this->attributes['TELF2'] = $value;
    }

    /**
     * Celular
     */
    public function getCelularAttribute()
    {
        return $this->getAttributeFromArray('CELU1');
    }

    public function setCelularAttribute($value)
    {
        $this->attributes['CELU1'] = $value;
    }

    /**
     * Estado de pais
     */
    public function getEstadoAttribute()
    {
        return $this->getAttributeFromArray('ESTADO');
    }

    public function setEstadoAttribute($value)
    {
        $this->attributes['ESTADO'] = $value;
    }

    /**
     * Municipio
     */
    public function getMunicipioAttribute()
    {
        return $this->getAttributeFromArray('MUNICIPIO');
    }

    public function setMunicipioAttribute($value)
    {
        $this->attributes['MUNICIPIO'] = $value;
    }

    /**
     * Parroquia
     */
    public function getParroquiaAttribute()
    {
        return $this->getAttributeFromArray('PARROQUIA');
    }

    public function setParroquiaAttribute($value)
    {
        $this->attributes['PARROQUIA'] = $value;
    }

    /**
     * Actividad Economica
     */
    public function getIdActividadEconomicaAttribute()
    {
        return $this->getAttributeFromArray('ACTECO');
    }

    public function setIdActividadEconomicaAttribute($value)
    {
        $this->attributes['ACTECO'] = $value;
    }

    /**
     * Get the column name for the "remember me" token.
     *
     * @return string
     */
    public function getRememberTokenName()
    {
        return 'REMTOKEN';
    }
}
