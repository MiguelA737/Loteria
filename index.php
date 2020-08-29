<!DOCTYPE HTML>
<html>
    <head>
        <title>Loteria</title>
    </head>
    <body>

        <?php
            //A ideia deste programa consiste em gerar um bilhete de loteria toda vez que a página no navegador é atualizada.
            //Há a chance aleatória de se ganhar um determinado carro, cujo modelo e valor devem ser mostrados na tela, se for o caso.

            //Layout básico
            echo "<h2>Loteria</h2>";
            echo "<br><br>";

            //Definição do array multidimensional carros [Modelo, Valor].
            //Esse array contém os modelos de carros ofertados e seus respectivos modelos.
            $carros = [
                ["Volkswagen Fusca", 17500],
                ["Chevrolet Onix", 56000],
                ["Ford Ka", 30000],
                ["Tesla Model Y", 450000],
                ["BMW i3", 230000]
            ];
            
            //Definição do array associativo num_premiados (Número Premiado => Carro).
            //Esse array associa os carros ofertados (arrays indexados-elementos de carros) aos números premiados.
            $num_premiados = array(
                10 => $carros[0],
                34 => $carros[1],
                51 => $carros[2],
                82 => $carros[3],
                99 => $carros[4]
            );

            //Definição da variável num_bilhete (valor aleatório entre 1 e 100).
            //Essa variável contém o número do bilhete do usuário do programa.
            $num_bilhete = random_int(1, 100);

            //Exibe-se o número do bilhete ao usuário:
            echo "<p>Número do seu bilhete: " . $num_bilhete . "</p>";

            //Definição da variável premio (para se obter o prêmio, ou nada). Esta servirá de controle ao looping a seguir.
            $premio = null;

            //Este looping percorrerá cada associação de num_premiados, com o intuito de se verificar se o número do bilhete do usuário corresponde a algum número premiado.
            foreach($num_premiados as $num_premiado => $carro) {

                //Verifica-se se o número do bilhete é premiado. Caso seja, armazena-se em premio o carro associado (que é um array indexado do tipo [Modelo, Valor]).
                if($num_bilhete == $num_premiado) {
                    $premio = $carro;
                    //Como só há um número premiado para cada carro, não há necessidade de se continuar esse looping após encontrá-lo.
                    break;
                }

            }

            //Se premio não for nulo, isso significa que o usuário de fato ganhou um carro, cujos dados estão armazenados em tal variável.
            if($premio != null) {

                //Imprime-se o resultado ao usuário.
                echo "<p>Você GANHOU um carro!!! Parabéns!!! :D</p>";
                echo "<br>";
                echo "<p>Modelo: " . $premio[0] . "; Valor: R$" . $premio[1] . " </p>";

            }

            //Caso premio seja nulo, isso significa que usuário não ganhou prêmio algum.
            else {

                //Imprime-se o resultado ao usuário.
                echo "<p>Infelizmente, você não ganhou :(</p>";
                echo "<br>";
                echo "<p>Mais sorte da próxima vez! ^^</p>";

            }

            echo "<br><br>";

            //Aqui faz-se uma tabela para mostrar ao usuário os possíveis prêmios e seus valores.
            echo "<h4>TABELA DE PRÊMIOS</h4>";

            echo "<table>";
            echo "  <tr>";
            echo "      <td><b>Modelo</b></td>";
            echo "      <td><b>Valor (R$)</b></td>";
            echo "  </tr>";

            //Realiza-se um looping dentro de um looping para se varrer as duas dimensões do array carros.
            for($i = 0; $i < count($carros); $i++) {

                echo "<tr>";

                for($j = 0; $j < count($carros[$i]); $j++) {

                    //Imprime-se cada elemento do array multidimensional para o usuário.
                    echo "<td>" . $carros[$i][$j] . "</td>";

                }

                echo "</tr>";

            }

            echo "</table>";

        ?>

    </body>
</html>