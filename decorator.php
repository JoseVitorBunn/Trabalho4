<?php

// Interface Componente
interface Report
{
    public function generate();
}

// Componente Concreto
class BasicReport implements Report
{
    public function generate()
    {
        return "Relatório Básico";
    }
}

// Decorator Abstrato
abstract class ReportDecorator implements Report
{
    protected $report;

    public function __construct(Report $report)
    {
        $this->report = $report;
    }

    public function generate()
    {
        return $this->report->generate();
    }
}

// Decorator Concreto - Adiciona formatação em HTML
class HtmlReportDecorator extends ReportDecorator
{
    public function generate()
    {
        $basicReport = parent::generate();
        return "<html><body>{$basicReport}</body></html>";
    }
}

// Decorator Concreto - Adiciona formatação em PDF
class PdfReportDecorator extends ReportDecorator
{
    public function generate()
    {
        $basicReport = parent::generate();
        return "[PDF] {$basicReport}";
    }
}

// Uso
$basicReport = new BasicReport();
$htmlFormattedReport = new HtmlReportDecorator($basicReport);
$pdfFormattedReport = new PdfReportDecorator($htmlFormattedReport);

// Exibição na página HTML
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Decorator Example</title>
</head>
<body>
    <h1>Decorator Example</h1>

    <h2>Relatório Formatado em HTML</h2>
    <p><?php echo $htmlFormattedReport->generate(); ?></p>

    <h2>Relatório Formatado em PDF</h2>
    <p><?php echo $pdfFormattedReport->generate(); ?></p>
</body>
</html>
