<?php


namespace Code\DB;
use \PDO;


abstract class Entity
{

	private $conn;
	protected $table;

	
	function __construct(PDO $conn)
	{
		$this->conn = $conn;
	}

	public function findAll($fields = '*')
	{
		$sql = 'SELECT ' . $fields . ' FROM ' . $this->table;
		$get = $this->conn->query($sql);
		
		return $get->fetchAll(PDO::FETCH_ASSOC);
	}

	public function find(int $id)
	{	
		$sql = 'SELECT * FROM ' . $this->table . ' WHERE id = :id';

		$get = $this->conn->prepare($sql);
		$get->bindValue(':id', $id, \PDO::PARAM_INT);
		$get->execute();

		return $get->fetch(PDO::FETCH_ASSOC);

	}

	public function where(array $conditions, $operator = ' AND ', $fields = '*')
	{
		$sql = 'SELECT ' . $fields . ' FROM ' . $this->table . ' WHERE ';

		$binds = array_keys($conditions);

		// var_dump($binds);
		$where = null;

		foreach ($binds as $v) {
			
			if (is_null($where)) {
				
				$where .= $v . ' = :' . $v;
			}
			else {

				$where .= $operator . $v . ' = :' . $v;
			}
		}

		$sql .= $where;

		// print $sql;

		$get = $this->bind($sql, $conditions);
		$get->execute();

		return $get->fetchAll(\PDO::FETCH_ASSOC);

		// print $sql;
		
	}

	public function insert(array $data)
	{	
		// pega os índices, as chaves do array
		$binds = array_keys($data);
		// converte o array em string separada por vírgula
		$fields = implode(', ', $binds);
		// converte o array em string separada por vírgula e dois pontos
		$values = implode(', :', $binds);

		// print_r($values);die;

		$sql = 'INSERT INTO ' . $this->table . '('. $fields .', created_at, updated_at) VALUES(:' . $values .', NOW(), NOW())';

		// print($sql);die;

		$insert = $this->bind($sql, $data);
		return $insert->execute();

	}


	public function update(array $data)
	{	

		if (!array_key_exists('id', $data)) {
			
			throw new \Exception("Informe um ID válido.");
			
		}

		$sql = 'UPDATE ' . $this->table . ' SET ';
		$set = null;

		$binds = array_keys($data);

		foreach ($binds as $v) {
			
			if ($v !== 'id') {
				
				$set .= is_null($set) ? $v . ' = :' . $v : ', ' . $v . ' = :' . $v;
			}
		}

		// print $set; die; // result: categoria_id = :categoria_id, nome = :nome, preco = :preco, quantidade = :quantidade, descricao = :descricao, slug = :slug,

		$sql .= $set . ', updated_at=NOW() WHERE id= :id';
		$update = $this->bind($sql, $data);

		return $update->execute();

	}

	public function delete(int $id)
	{
		$sql = 'DELETE FROM ' . $this->table . ' WHERE id=:id';
		
		$delete = $this->bind($sql, ['id' => $id]);

		return $delete->execute();
	}

	private function bind($sql, array $data) {

		$bind = $this->conn->prepare($sql);

		foreach ($data as $k => $v) {
			
			gettype($v) == 'int' ? $bind->bindValue(':' . $k, $v, \PDO::PARAM_INT) 
								 : $bind->bindValue(':' . $k, $v, \PDO::PARAM_STR);
		}

		return $bind;
	}

}