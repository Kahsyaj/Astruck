<?php
//Création d'une classe Purchase
class Purchase
{
	protected $id_commande;
	protected $id_produit;
	protected $quantite;

	/**
	*	@param array $params tableau associatif contenant le couple clé/valeur d'initialisation de l'objet
	*/
	//Methodes d'initialisation (constructeur et hydratation)
	public function __construct(Array $params)
	{
		$this->hydrate($params);
	}

	/**
	*	@param array $data tableau associatif contenant le couple clé/valeur d'initialisation de l'objet
	*/
	public function hydrate(Array $data)
	{
		foreach ($data as $key => $value)
		{
			$method = "set" . ucfirst($key);
			if (method_exists($this, $method))
			{
				$this->$method($value);
			}
		}
	}

	//Getters
	public function getId_commande()
	{
		return $this->id_commande;
	}

	public function getId_produit()
	{
		return $this->id_produit;
	}

	public function getQuantite()
	{
		return $this->quantite;
	}

	//Setters
	public function setId_commande($new)
	{
		$this->id_commande = (int) $new;
	}

	public function setId_produit($new)
	{
		$this->id_produit = (int) $new;
	}

	public function setQuantite($new)
	{
		$this->quantite = (int) $new;
	}

	//Fonction permettant de retourner un tableau des valeurs des attributs de notre objet
	/**
	*	@param bool $assoc|false permetant de recuperer un tableau associatif si vrai
	*	@return array $objArray contenant toutes les valeurs des attributs de l'objet
	*/
	public function toArray(bool $assoc = false)
	{
		$objArray = array();
		if ($assoc)
		{
			foreach ($this as $attr => $value)
			{
				$objArray[$attr] = $value;
			}
		}
		else
		{
			foreach ($this as $attr => $value)
			{
				$objArray[] = $value;
			}
		}
		return $objArray;
	}
}