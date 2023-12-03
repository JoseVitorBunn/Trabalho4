<?php

// Interface para as estratégias de ordenação
interface SortingStrategy {
    public function sort(array $data): array;
}

// Estratégia de ordenação ascendente
class AscendingSort implements SortingStrategy {
    public function sort(array $data): array {
        sort($data);
        return $data;
    }
}

// Estratégia de ordenação descendente
class DescendingSort implements SortingStrategy {
    public function sort(array $data): array {
        rsort($data);
        return $data;
    }
}

// Contexto que utiliza a estratégia
class SorterContext {
    private $sortingStrategy;

    public function __construct(SortingStrategy $strategy) {
        $this->sortingStrategy = $strategy;
    }

    public function setSortingStrategy(SortingStrategy $strategy) {
        $this->sortingStrategy = $strategy;
    }

    public function sortData(array $data): array {
        return $this->sortingStrategy->sort($data);
    }
}

// Exemplo de uso
$data = [5, 2, 8, 1, 7];

// Utilizando a estratégia de ordenação ascendente
$ascendingSort = new AscendingSort();
$context = new SorterContext($ascendingSort);
$result = $context->sortData($data);
echo "Ordenação Ascendente: " . implode(", ", $result) . "<br>";

// Utilizando a estratégia de ordenação descendente
$descendingSort = new DescendingSort();
$context->setSortingStrategy($descendingSort);
$result = $context->sortData($data);
echo "Ordenação Descendente: " . implode(", ", $result) . "<br>";

?>
