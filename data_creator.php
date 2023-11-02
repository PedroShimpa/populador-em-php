<?php
class DataCreator
{
	protected $insert;

	protected $qtd;

	private $names = ["João", "Maria", "Pedro", "Ana", "José", "Luana", "Miguel", "Sofia", "Rafael", "Lara", "Lucas", "Laura", "Gustavo", "Isabel", "André", "Carolina", "Matheus", "Beatriz", "Fernando", "Camila", "Rodrigo", "Juliana", "Diego", "Larissa", "Ricardo", "Lívia", "Eduardo", "Natália", "Paulo", "Gabriela", "Vitor", "Amanda", "Bruno", "Manuela", "Leonardo", "Fernanda", "Alexandre", "Patrícia", "Carlos", "Isabela", "Rui", "Débora", "Hugo", "Carla", "Sérgio", "Daniela", "Raul", "Vanessa", "Felipe", "Roberta", "Marco", "Tatiana", "Gilberto", "Monica", "Gonçalo", "Renata", "Antônio", "Catarina", "Francisco", "Bianca", "Emanuel", "Luísa", "Luís", "Cláudia", "Vasco", "Mariana", "Joaquim", "Elisabete", "Daniel", "Célia", "Adriano", "Silvana", "Igor", "Verônica", "Santiago", "Andreia", "Davi", "Evelyn", "Fábio", "Rita", "Nuno", "Paula", "Ricardo", "Simone", "Samuel", "Sara", "Vicente", "Rosana", "Rafael", "Inês", "Matias", "Adelaide", "Tobias", "Fátima", "Oliver", "Cristina", "Nelson", "Eunice", "Renato", "Elisa", "Breno", "Tânia", "Eduardo", "Clara", "Thiago", "Rosa", "Marcelo", "Lorena"];

	private $surnames = ["Silva", "Santos", "Oliveira", "Pereira", "Almeida", "Ferreira", "Rodrigues", "Carvalho", "Gomes", "Martins", "Rocha", "Reis", "Lima", "Castro", "Cunha", "Mendes", "Dias", "Freitas", "Campos", "Costa", "Cardoso", "Nunes", "Souza", "Pinto", "Araújo", "Fernandes", "Barbosa", "Neves", "Teixeira", "Magalhães", "Correia", "Dantas", "Bezerra", "Vieira", "Barros", "Sousa", "Sá", "Moraes", "Moura", "Fonseca", "Nascimento", "Aguiar", "Domingues", "Carneiro", "Machado", "Coelho", "Azevedo", "Moreira", "Tavares", "Vargas", "Fagundes", "Lopes", "Vasconcelos", "Borges", "Duarte", "Gonçalves", "Vieira", "Siqueira", "Coutinho", "Braga", "Cavalcanti", "Trindade", "Miranda", "Leal", "Cordeiro", "Meireles", "Medeiros", "Cavalcante", "Ribeiro", "Couto", "Alves", "Costa", "Paiva", "Amaral", "Dantas", "Garcia", "Loureiro", "Gusmão", "Lemos", "Agostinho", "Santiago", "Caldeira", "Pacheco", "Camargo", "Espírito Santo", "Pires", "Gouveia", "Santiago", "Macedo", "Fonseca", "Pessoa", "Santana", "Caldeira", "Maciel", "Rezende"];

	private $words = ["Lorem", "ipsum", "dolor", "sit", "amet", "consectetur", "adipiscing", "elit", "sed", "do", "eiusmod", "tempor", "incididunt", "ut", "labore", "et", "dolore", "magna", "aliqua", "Ut", "enim", "ad", "minim", "veniam", "quis", "nostrud", "exercitation", "ullamco", "laboris", "nisi", "aliquip", "ex", "ea", "commodo", "consequat", "Duis", "aute", "irure", "in", "reprehenderit", "in", "voluptate", "velit", "esse", "cillum", "dolore", "eu", "fugiat", "nulla", "pariatur", "Excepteur", "sint", "occaecat", "cupidatat", "non", "proident", "sunt", "in", "culpa", "qui", "officia", "deserunt", "mollit", "anim", "id", "est", "laborum"];

	public function getText(): string
	{
		$text = '';
		for ($i = 0; $i < 20; $i++) {
			$text  = $text. ' '. $this->words[array_rand($this->words)];
		}
		return $text;
	}
	public function getNumber(): string
	{
		return rand(1, 500);
	}

	public function getName(): string
	{
		return $this->randomData($this->names);
	}

	public function getEmail()
	{
		return $this->randomData($this->createEmails($this->names));
	}

	public function getTime(): string
	{
		return $this->createRandomDate();
	}

	public function getSurname(): string
	{
		return $this->randomData($this->surnames);
	}

	private function createEmails(): array
	{
		$emails = array();
		foreach ($this->names as $name) {
			array_push($emails, $this->removeUtf8($name) . '@example.com');
		}
		return $emails;
	}

	private function createRandomDate(): string
	{
		$startDate = new DateTime('2000-01-01');
		$endDate = new DateTime('2023-12-31');
		$randomTimestamp = mt_rand($startDate->getTimestamp(), $endDate->getTimestamp());
		$randomDate = new DateTime();
		return $randomDate->setTimestamp($randomTimestamp)->format('Y-m-d H:i:s');
	}

	private function randomData(array $data): string
	{
		return $data[array_rand($data)];
	}

	private  function removeUtf8($texto)
	{
		$texto = iconv('UTF-8', 'ASCII//TRANSLIT', $texto);
		$texto = preg_replace('/[^A-Za-z0-9\-]+/', ' ', $texto);
		$texto = preg_replace('/\s+/', '-', $texto);
		$texto = strtolower($texto);
		return $texto;
	}
}
