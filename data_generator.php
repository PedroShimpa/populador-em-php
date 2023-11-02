<?php

class DataGenerator
{
    static $names = ["João", "Maria", "Pedro", "Ana", "José", "Luana", "Miguel", "Sofia", "Rafael", "Lara", "Lucas", "Laura", "Gustavo", "Isabel", "André", "Carolina", "Matheus", "Beatriz", "Fernando", "Camila", "Rodrigo", "Juliana", "Diego", "Larissa", "Ricardo", "Lívia", "Eduardo", "Natália", "Paulo", "Gabriela", "Vitor", "Amanda", "Bruno", "Manuela", "Leonardo", "Fernanda", "Alexandre", "Patrícia", "Carlos", "Isabela", "Rui", "Débora", "Hugo", "Carla", "Sérgio", "Daniela", "Raul", "Vanessa", "Felipe", "Roberta", "Marco", "Tatiana", "Gilberto", "Monica", "Gonçalo", "Renata", "Antônio", "Catarina", "Francisco", "Bianca", "Emanuel", "Luísa", "Luís", "Cláudia", "Vasco", "Mariana", "Joaquim", "Elisabete", "Daniel", "Célia", "Adriano", "Silvana", "Igor", "Verônica", "Santiago", "Andreia", "Davi", "Evelyn", "Fábio", "Rita", "Nuno", "Paula", "Ricardo", "Simone", "Samuel", "Sara", "Vicente", "Rosana", "Rafael", "Inês", "Matias", "Adelaide", "Tobias", "Fátima", "Oliver", "Cristina", "Nelson", "Eunice", "Renato", "Elisa", "Breno", "Tânia", "Eduardo", "Clara", "Thiago", "Rosa", "Marcelo", "Lorena"];

    static $surnames = ["Silva", "Santos", "Oliveira", "Pereira", "Almeida", "Ferreira", "Rodrigues", "Carvalho", "Gomes", "Martins", "Rocha", "Reis", "Lima", "Castro", "Cunha", "Mendes", "Dias", "Freitas", "Campos", "Costa", "Cardoso", "Nunes", "Souza", "Pinto", "Araújo", "Fernandes", "Barbosa", "Neves", "Teixeira", "Magalhães", "Correia", "Dantas", "Bezerra", "Vieira", "Barros", "Sousa", "Sá", "Moraes", "Moura", "Fonseca", "Nascimento", "Aguiar", "Domingues", "Carneiro", "Machado", "Coelho", "Azevedo", "Moreira", "Tavares", "Vargas", "Fagundes", "Lopes", "Vasconcelos", "Borges", "Duarte", "Gonçalves", "Vieira", "Siqueira", "Coutinho", "Braga", "Cavalcanti", "Trindade", "Miranda", "Leal", "Cordeiro", "Meireles", "Medeiros", "Cavalcante", "Ribeiro", "Couto", "Alves", "Costa", "Paiva", "Amaral", "Dantas", "Garcia", "Loureiro", "Gusmão", "Lemos", "Agostinho", "Santiago", "Caldeira", "Pacheco", "Camargo", "Espírito Santo", "Pires", "Gouveia", "Santiago", "Macedo", "Fonseca", "Pessoa", "Santana", "Caldeira", "Maciel", "Rezende"];



    public static function getInsertData(int $qtd = 200): array
    {
        $finalData = [];
        for ($i = 1; $i <= $qtd; $i++) {
            $data = [
                'nome' => self::$names[rand(0, count(self::$names) - 1)],
                'sobrenome' => self::$surnames[rand(0, count(self::$surnames) - 1)]
            ];
            array_push($finalData, $data);
        }
        return $finalData;
    }
}
