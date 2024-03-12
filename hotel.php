<?php

class Quarto {
    public $numero;
    public $tipo;
    public $precoDiaria;
    public $reservado = false;

    public function verificarDisponibilidade() {
        return !$this->reservado;
    }
}

class Hospede {
    public $nome;
    public $email;

    public function __construct($nome, $email) {
        $this->nome = $nome;
        $this->email = $email;
    }
}

class Reserva {
    public $quarto;
    public $hospede;
    public $dataInicio;
    public $dataFim;
    public $custoTotal;

    public function calculaCustoTotal() {
        $dias = abs(strtotime($this->dataFim) - strtotime($this->dataInicio)) / (60 * 60 * 24);
        $this->custoTotal = $dias * $this->quarto->precoDiaria;
    }
}

class Hotel {
    public $quartos = [];
    public $reservas = [];

    public function adicionarQuarto($quarto) {
        $this->quartos[] = $quarto;
    }

    public function reservarQuarto($quarto, $hospede, $dataInicio, $dataFim) {
        if ($quarto->verificarDisponibilidade()) {
            $reserva = new Reserva();
            $reserva->quarto = $quarto;
            $reserva->hospede = $hospede;
            $reserva->dataInicio = $dataInicio;
            $reserva->dataFim = $dataFim;
            $reserva->calculaCustoTotal();

            $quarto->reservado = true;
            $this->reservas[] = $reserva;
            return $reserva;
        } else {
            return null;
        }
    }

    public function exibirQuartosDisponiveis() {
        echo "Quartos disponíveis:\n";
        foreach ($this->quartos as $quarto) {
            if (!$quarto->reservado) {
                echo "Quarto $quarto->numero - $quarto->tipo\n";
            }
        }
    }
}

// Exemplo de Uso
$hotel = new Hotel();

$quarto1 = new Quarto();
$quarto1->numero = 1;
$quarto1->tipo = "Standard";
$quarto1->precoDiaria = 100;
$hotel->adicionarQuarto($quarto1);

$quarto2 = new Quarto();
$quarto2->numero = 2;
$quarto2->tipo = "Luxo";
$quarto2->precoDiaria = 200;
$hotel->adicionarQuarto($quarto2);

$hotel->exibirQuartosDisponiveis();

$hospede = new Hospede("João", "joao@example.com");

$reserva1 = $hotel->reservarQuarto($quarto1, $hospede, "2022-10-01", "2022-10-05");
if ($reserva1) {
    echo "Custo total da reserva: $" . $reserva1->custoTotal . "\n";
}

$reserva2 = $hotel->reservarQuarto($quarto1, $hospede, "2022-10-10", "2022-10-15");
if ($reserva2) {
    echo "Custo total da reserva: $" . $reserva2->custoTotal . "\n";
} else {
    echo "Quarto ocupado.\n";
}

$hotel->exibirQuartosDisponiveis();

?>