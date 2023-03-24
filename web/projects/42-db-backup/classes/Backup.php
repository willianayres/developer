<?php
	class Backup{
		public static function backup($pdo){
			$file = fopen(date('Y-m-d').'.txt','wt');
			$tables = $pdo->query('SHOW TABLES');
			foreach($tables as $table){
				$sql = '-- TABLE: '.$table[0].PHP_EOL;
				$create = $pdo->query('SHOW CREATE TABLE `'.$table[0].'`')->fetch();
				$sql .= $create['Create Table'].';'.PHP_EOL;
				fwrite($file,$sql);

				$rows = $pdo->query('SELECT * FROM `'.$table[0].'`');
				$rows->setFetchMode(PDO::FETCH_ASSOC);
				foreach($rows as $row){
					$row = array_map(array($pdo,'quote'),$row);
					$sql = 'INSERT INTO `'.$table[0].'` (`'.implode('`, `',array_keys($row)).'`) VALUES ('.utf8_encode(implode(', ',$row)).');'.PHP_EOL;
					fwrite($file,$sql);
				}

				$sql = PHP_EOL;
				$result = fwrite($file,$sql);

				if($result !== false){
					echo 'BACKUP FEITO COM SUCESSO!';
				}else{
					echo 'OPS! OCORREU UM ERRO NO BACKUP!';
				}

				flush();
			}
			fclose($file);
		}
	}
?>