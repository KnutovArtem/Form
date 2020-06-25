<?php

define( 'SECRET_KEY', '6LdvgvkUAAAAAF9q1ZeC5Ph89Ul80ZcaJf8t07AB' );

if ( $_POST ) {

    function getCaptcha( $SecretKey ) {
        $Response = file_get_contents( "https://www.google.com/recaptcha/api/siteverify?secret=" . SECRET_KEY . "&response={$SecretKey}" );
        echo $Response;
        echo 'sss';
        $Return = json_decode( $Response );

        return $Return;
    }

    $Return = getCaptcha( $_POST['g-recaptcha-response'] );

    //Response output
    var_dump( $Return );


    if ( $Return->success == true && $Return->score > 0.5 ) {
        /*ПОМЕЩАЕМ ДАННЫЕ ИЗ ПОЛЕЙ В ПЕРЕМЕННЫЕ*/
        $name  = $_POST["name"];
        $email = $_POST["email"];
        $phone = $_POST["tel"];

        /*ЗДЕСЬ ПРОВЕРЯЕМ ЕСЛИ ХОТЯ БЫ ОДНО ИЗ ПОЛЕЙ НЕ ЗАПОЛНЕНО МЫ ВОЗВРАЩАЕМ СООБЩЕНИЕ*/
        if ( $name == "" or $email == "" or $phone == "" ) {
            echo "Заполните все поля";
        } else {
            /*ЕСЛИ ВСЕ ПОЛЯ ЗАПОЛНЕНЫ НАЧИНАЕМ СОБИРАТЬ ДАННЫЕ ДЛЯ ОТПРАВКИ*/
            $to      = "arv.knutov@gmail.com"; /* Адрес, куда отправляем письма*/
            $subject = "Письмо с обратной связи"; /*Тема письма*/
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=utf-8\r\n";
            $headers .= "From: <arv.knutov@gmail.com>\r\n";/*ОТ КОГО*/

            /*ВО ВНУТРЬ ПЕРЕМЕННОЙ $message ЗАПИСЫВАЕМ ДАННЫЕ ИЗ ПОЛЕЙ */
            $message .= "Имя пользователя: " . $name . "\n";
            $message .= "Почта: " . $email . "\n";
            $message .= "Телефон: " . $phone . "\n";

            /*ДЛЯ ОТЛАДКИ ВЫ МОЖЕТЕ ПРОВЕРИТЬ ПРАВИЛЬНО ЛИ ЗАПИСАЛИCM ДАННЫЕ ИЗ ПОЛЕЙ*/

            $send = mail( $to, $subject, $message, $headers );

            /*ЕСЛИ ПИСЬМО ОТПРАВЛЕНО УСПЕШНО ВЫВОДИМ СООБЩЕНИЕ*/
            if ( $send == "true" ) {
                echo "Ваше сообщение отправлено. Мы ответим вам в ближайшее время.\r\n";
            } /*ЕСЛИ ПИСЬМО НЕ УДАЛОСЬ ОТПРАВИТЬ ВЫВОДИМ СООБЩЕНИЕ ОБ ОШИБКЕ*/
            else {
                echo "Не удалось отправить, попробуйте снова!";
            }
        }

    } else {
        echo "no";
    }
}

?>
























