<?php
// Inclua o PHPMailer no projeto
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Carregue o autoloader do Composer
require '../vendor/autoload.php';

// Verifique se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Obtenha os dados do formulário
    $nome = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $whatsapp = htmlspecialchars($_POST['whatsapp']);
    $curso = htmlspecialchars($_POST['curso']);
    $mensagem = htmlspecialchars($_POST['mensagem']);

    // Crie uma instância do PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Configuração do servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.kinghost.net'; // Substitua pelo servidor SMTP da KingHost
        $mail->SMTPAuth = true;
        $mail->Username = 'atendimento@speedway.net.br'; // Seu e-mail
        $mail->Password = 'Johnsteve10@'; // Sua senha
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS; // Usar STARTTLS
        $mail->Port = 587; // Porta SMTP

        // Remetente e destinatário
        $mail->setFrom('atendimento@speedway.net.br', 'Speed Way');
        $mail->addAddress('atendimento@speedway.net.br'); // E-mail de destino

        // Conteúdo do e-mail
        $mail->isHTML(true);
        $mail->Subject = "Nova Matrícula - $curso";
        $mail->Body = "
            <h3>Nova Solicitação de Matrícula</h3>
            <p><strong>Nome:</strong> $nome</p>
            <p><strong>E-mail:</strong> $email</p>
            <p><strong>WhatsApp:</strong> $whatsapp</p>
            <p><strong>Curso Desejado:</strong> $curso</p>
            <p><strong>Mensagem:</strong><br>$mensagem</p>
        ";

        // Enviar o e-mail
        $mail->send();
        echo "Mensagem enviada com sucesso!";
    } catch (Exception $e) {
        echo "Erro ao enviar a mensagem: {$mail->ErrorInfo}";
    }
} else {
    echo "Método inválido.";
}
?>
