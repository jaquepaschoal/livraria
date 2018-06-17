<?php
	class livro_dao extends conexao
	{
		function __construct()
		{
			parent:: __construct();
		}
		
		function all()
		{
			
			$sql="SELECT titulo, editora.nome, genero.descricao  FROM livro 
						INNER JOIN genero ON (genero.idgenero = livro.idgenero)
						INNER JOIN editora ON (editora.ideditora = livro.ideditora)";
			try
				{
					$f = $this->db->prepare($sql);
					$ret=$f->execute();
					$this->db = null;
					if(!$ret)
					{
						echo "Erro ao buscar todos os livros";
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

		function searchBookAuthor($livro)
		{
			
			$sql="SELECT * FROM autor_livro 
						INNER JOIN autor ON (autor_livro.idautor = autor.idautor) 
						INNER JOIN livro ON (autor_livro.idlivro = livro.idlivro)
						WHERE autor_livro.idautor = ? ";
			try
				{
					$f = $this->db->prepare($sql);
					$f -> bindValue(1,$livro -> getAutor()[0] -> getIdautor ());
					$ret=$f->execute();
					$this->db = null;
					if(!$ret)
					{
						echo "Erro ao buscar livro por autor";
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

		function searchBookGenero($livro)
		{
			
			$sql="SELECT * FROM livro
						INNER JOIN genero ON (genero.idgenero = livro.idgenero) 
						WHERE livro.idgenero = ?";
			try
				{
					$f = $this->db->prepare($sql);
					$f -> bindValue(1,$livro -> getGenero()-> getIdgenero ());
					$ret=$f->execute();
					$this->db = null;
					if(!$ret)
					{
						echo "Erro ao buscar livro por genero";
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

		function searchBookEditora($livro)
		{
			$sql="SELECT * FROM livro
						INNER JOIN editora ON (editora.ideditora = livro.ideditora) 
						WHERE livro.ideditora = ?";
			try
				{
					$f = $this->db->prepare($sql);
					$f -> bindValue(1,$livro -> getEditora() -> getIdeditora ());
					$ret=$f->execute();
					$this->db = null;
					if(!$ret)
					{
						echo "Erro ao buscar livro por editora";
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

		

		function insert($livro) {
			$sql = "INSERT INTO livro ( titulo, idgenero, ideditora ) VALUE (?,?,?)";
			
			try
			{
				$stmt = $this->db->prepare($sql);
				$stmt->bindValue(1,$livro->getTitulo());
				$stmt->bindValue(2,$livro -> getGenero() -> getIdgenero ());
				$stmt->bindValue(3,$livro -> getEditora() -> getIdeditora ());
				$ret = $stmt->execute();
				if(!$ret)
				{
					die("Erro ao inserir livro");
				} else {
					$idlivro = $this->db->lastInsertId();
					$autores = $livro->getAutor();
					$sql = 'INSERT INTO autor_livro (idautor,idlivro) VALUE (?,?)';
					try
					{
						$stmt = $this->db->prepare($sql);
						foreach ($autores as $dado) {
							$stmt->bindValue(1,$dado->getIdautor());
							$stmt->bindValue(2,$idlivro);
							$ret = $stmt->execute();
						}
						if(!$ret)
						{
							die("Erro ao inserir autor");
						}
						
					}
					catch (PDOException $e)
					{
						die ($e->getMessage());
					}

				}
			}
			catch (PDOException $e)
			{
				die ($e->getMessage());
			}
		}
	}
?>