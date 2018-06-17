<?php
	class genero_dao extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}

		function all()
		{
			
			$sql="SELECT *  FROM genero";
			try
			{
				$f = $this->db->prepare($sql);
				$ret=$f->execute();
				$this->db = null;
				if(!$ret)
				{
					echo "Erro ao buscar todos os generos";
				}
				else
				{
					$resultado = $f->fetchAll(PDO::FETCH_OBJ);
					return $resultado;
				}
			}
			catch ( Exception $e )
			{
				die ($e->getMessage());
			}	  
		}
		
		function insert( $genero ) {
			$sql = "INSERT INTO genero ( descricao ) VALUE (?)";
			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1, $genero->getDescricao());
				$ret = $stmt->execute();
				$this->db = null;
				if(!$ret)
				{
					die("Erro ao inserir genero");
				} else {
					return $genero->getDescricao();
				}
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}


	}
?>