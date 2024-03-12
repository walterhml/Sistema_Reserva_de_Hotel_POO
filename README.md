# Sistema_Reserva_de_Hotel_POO

# para ver resultado
baixe esse repositorio em sua maquina e coloque na pasta htdocs no xamp
inicie o apache.
abra o localhost do seu navegador, abrindo a pasta com o diretorio hotel.php!

Este código PHP define quatro classes: Quarto, Hospede, Reserva, e Hotel.

A classe Quarto representa um quarto de hotel com propriedades como número, tipo, preço da diária e um status de reserva. Possui um método verificarDisponibilidade que retorna se o quarto está disponível ou não.

A classe Hospede representa um hóspede com propriedades como nome e email. Possui um construtor para inicializar essas propriedades.

A classe Reserva representa uma reserva de hotel com propriedades como quarto, hóspede, datas de início e fim da reserva, custo total e um método calculaCustoTotal que calcula o custo total da reserva com base no número de dias e no preço da diária do quarto.

A classe Hotel representa um hotel com propriedades para armazenar quartos e reservas. Possui métodos para adicionar um quarto à lista de quartos disponíveis, reservar um quarto para um hóspede em datas específicas, exibir os quartos disponíveis no hotel.

O método reservarQuarto em Hotel verifica se o quarto está disponível, cria uma nova reserva, calcula o custo total, marca o quarto como reservado e adiciona a reserva à lista de reservas do hotel.

O método exibirQuartosDisponiveis em Hotel mostra os quartos disponíveis, ou seja, aqueles que não estão reservados.

Em resumo, essas classes modelam um sistema simples de reserva de quartos em um hotel, permitindo adicionar quartos, fazer reservas, calcular custos e exibir quartos disponíveis.
