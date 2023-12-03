<?php

// Interface Observer
interface Observer {
    public function update(string $message);
}

// Classe ConcreteObserver
class ConcreteObserver implements Observer {
    private $name;

    public function __construct($name) {
        $this->name = $name;
    }

    public function update(string $message) {
        echo "Notificação para {$this->name}: {$message}<br>";
    }
}

// Classe Subject
class Subject {
    private $observers = [];

    public function addObserver(Observer $observer) {
        $this->observers[] = $observer;
    }

    public function removeObserver(Observer $observer) {
        $index = array_search($observer, $this->observers);
        if ($index !== false) {
            unset($this->observers[$index]);
        }
    }

    public function notifyObservers(string $message) {
        foreach ($this->observers as $observer) {
            $observer->update($message);
        }
    }
}

// Exemplo de uso

// Criando o Subject
$notificationSystem = new Subject();

// Criando Observadores
$observer1 = new ConcreteObserver("Usuário 1");
$observer2 = new ConcreteObserver("Usuário 2");
$observer3 = new ConcreteObserver("Usuário 3");

// Adicionando Observadores ao Subject
$notificationSystem->addObserver($observer1);
$notificationSystem->addObserver($observer2);
$notificationSystem->addObserver($observer3);

// Notificando Observadores
$notificationSystem->notifyObservers("Nova atualização no sistema!");

// Removendo um Observador
$notificationSystem->removeObserver($observer2);

// Notificando Observadores novamente após a remoção
$notificationSystem->notifyObservers("Outra notificação importante!");

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Observer Pattern Example</title>
</head>
<body>
    <!-- Aqui você pode adicionar qualquer conteúdo HTML que desejar -->
</body>
</html>
