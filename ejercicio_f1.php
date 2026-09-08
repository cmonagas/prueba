<?php 

/* 

Ejercicio F1 – Carrera de números Generar dos números aleatorios entre 1 y 10 en cada ronda. 
El mayor gana la ronda. Jugar 10 rondas y mostrar ganador final.

*/

	$a = 0;
	$b = 0;
	$total_a = 0;
	$total_b = 0;
	$empate = 0;
	$rondas = 0;
	
	echo "=== INICIO DE LA CARRERA DE NÚMEROS ==="."\n";
	
	$rondas = readline("Indique la cantidad de Rondas: ");
	
	for($i=1; $i<=$rondas; $i++){
		
		$a = readline("Ronda $i: Jugador A: ")."\n";
		$b = readline("Ronda $i: Jugador B: ")."\n";
		
		if($a > $b){
			
			echo "¡Gana Jugador A esta ronda!"."\n";
			$total_a++;
			
		}else if($b > $a){
			
			echo "¡Gana Jugador B esta ronda!"."\n";
			$total_b++;
			
		}else{
			
			echo "¡Empate en esta ronda!"."\n";
			$empate++;	
		}	
	}

	echo "=== RESULTADO FINAL ==="."\n";
	
	echo "Puntaje Jugador A: $total_a Victorias"."\n";
	echo "Puntaje Jugador B: $total_b Victorias"."\n";
	echo "Rondas Empatadas: $empate"."\n";
	
	if($total_a > $total_b){
		
		echo "¡El ganador final de la carrera es el Jugador A!"."\n";
		
	}else if($total_b > $total_a){
		
		echo "¡El ganador final de la carrera es el Jugador B!"."\n";
		
	}else{
		
		echo "¡Empate Global!"."\n";
	}

	
	
/* 

Tu lógica está excelente: el flujo de control, los contadores de rondas, 
las condiciones de comparación y la estructura de los resultados finales son totalmente 
correctos.


### Con Numeros Aleatorios: ###

<?php 

	$total_a = 0;
	$total_b = 0;
	$empate = 0;
	
	echo "=== INICIO DE LA CARRERA DE NÚMEROS ===" . "\n";
	
	$rondas = readline("Indique la cantidad de Rondas: ");
	
	for($i = 1; $i <= $rondas; $i++){
		
		// Generamos números aleatorios entre 1 y 10 para cada jugador
		$a = rand(1, 10);
		$b = rand(1, 10);
		
		echo "Ronda $i: Jugador A [$a] vs Jugador B [$b] -> ";
		
		if($a > $b){
			echo "¡Gana Jugador A esta ronda!" . "\n";
			$total_a++;
		} else if($b > $a){
			echo "¡Gana Jugador B esta ronda!" . "\n";
			$total_b++;
		} else {
			echo "¡Empate en esta ronda!" . "\n";
			$empate++;	
		}	
	}

	echo "\n" . "=== RESULTADO FINAL ===" . "\n";
	echo "Puntaje Jugador A: $total_a Victorias" . "\n";
	echo "Puntaje Jugador B: $total_b Victorias" . "\n";
	echo "Rondas Empatadas: $empate" . "\n";
	
	if($total_a > $total_b){
		echo "¡El ganador final de la carrera es el Jugador A!" . "\n";
	} else if($total_b > $total_a){
		echo "¡El ganador final de la carrera es el Jugador B!" . "\n";
	} else {
		echo "¡Empate Global!" . "\n";
	}

?>

*/	
	
?>