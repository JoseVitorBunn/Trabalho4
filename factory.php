<?php

// Interface Product: Define a interface para as formas geométricas
interface Shape {
    public function draw();
}

// ConcreteProduct: Implementações concretas das formas geométricas
class Circle implements Shape {
    public function draw() {
        return "Desenhando um círculo.";
    }
}

class Square implements Shape {
    public function draw() {
        return "Desenhando um quadrado.";
    }
}

class Triangle implements Shape {
    public function draw() {
        return "Desenhando um triângulo.";
    }
}

// Interface Creator: Define o Factory Method
interface ShapeFactory {
    public function createShape(): Shape;
}

// ConcreteCreator: Implementação concreta do Factory Method
class CircleFactory implements ShapeFactory {
    public function createShape(): Shape {
        return new Circle();
    }
}

class SquareFactory implements ShapeFactory {
    public function createShape(): Shape {
        return new Square();
    }
}

class TriangleFactory implements ShapeFactory {
    public function createShape(): Shape {
        return new Triangle();
    }
}

// Função para desenhar uma forma usando o Factory Method
function drawShape(ShapeFactory $factory) {
    $shape = $factory->createShape();
    echo $shape->draw() . "<br>";
}

// Exemplo de uso

// Criando instâncias das fábricas
$circleFactory = new CircleFactory();
$squareFactory = new SquareFactory();
$triangleFactory = new TriangleFactory();

// Desenhando um círculo
drawShape($circleFactory);

// Desenhando um quadrado
drawShape($squareFactory);

// Desenhando um triângulo
drawShape($triangleFactory);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factory Method Pattern Example</title>
</head>
<body>
    <!-- Aqui você pode adicionar qualquer conteúdo HTML que desejar -->
</body>
</html>
