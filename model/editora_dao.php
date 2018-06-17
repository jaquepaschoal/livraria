<?php
	class editora_dao extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		
		function all() {
			$sql="SELECT *  FROM editora";
			try
			{
				$f = $this->db->prepare($sql);
				$ret=$f->execute();
				$this->db = null;
				if(!$ret)
				{
					echo "Erro ao buscar todos os editoras";
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
  }
?>