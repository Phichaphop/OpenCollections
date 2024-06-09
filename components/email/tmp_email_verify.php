<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{header}</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Prompt:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Chakra+Petch:ital,wght@0,300;0,400;0,500;0,600;0,700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Noto+Sans+Thai:wght@100..900&family=Sarabun:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800&display=swap');

        * {
            margin: 0;
            padding: 0;
            font-family: 'Sarabun', sans-serif;
            box-sizing: border-box;
            color: #101010;
            text-decoration: none;
            outline: none;
            transition: 0.5s;
            line-height: 1.5;
            text-align: justify;
        }

        body {
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f8f9fa;
            margin: auto;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            width: 100%;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            padding: 20px;
            margin: auto;
        }

        header {
            background: #0f6cbd;
            padding: 15px 0;
            text-align: center;
            margin-bottom: 20px;
        }

        header img {
            height: 60px;
            width: auto;
        }

        section {
            margin-bottom: 20px;
        }

        .otp-code {
            background: #f8fafd;
            border-radius: 20px;
            padding: 20px 40px;
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            color: #0f6cbd;
            margin: 30px auto;
            width: auto;
            border: 1px solid #0f6cbd;
        }

        footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
    </style>
</head>

<body>
    <div class="container">
        <header>

        </header>

        <section>
            <p>Hello,</p>
            <p>We received a request to access your Open Collections account. Use the code below to complete your login</p>
            <div class="otp-code">{verify}</div>
            <p>This code is valid for one-time use only and will expire shortly.</p>
            <p>If you did not request this code, please change your password immediately to secure your account.</p>
            <p>Thank you for using Open Collections!</p>
            <br>
            <p>Please note<br>
                - The OpenCollections will never request your personal information, username, password and SMS OTP by telephone, e-mail, letter, or any other channels. For your security, please keep your personal information strictly confidential.<br>
                - This is an automatically generated e-mail. If you have additional questions, please contact at the branches. Please do not reply to this email for your security and prevention of unlawful actions.<br>
                - This document contains the Personal Data in accordance with the Personal Data Protection Act. B.E. 2562 (2019). In this regard, please delete and/or destroy such document if you are not the intended recipient.<br>
                - You have read thoroughly and acknowledged Privacy Notice as in the Financial Business Group’s website Kiatnakin Phatra’s Website > Privacy Notice or other channels.</p>
        </section>

        <section>
            <p>สวัสดี,</p>
            <p>เราได้รับคำขอในการเข้าถึงบัญชี Open Collections ของคุณ ใช้รหัสด้านล่างเพื่อทำการเข้าสู่ระบบของคุณให้สมบูรณ์</p>
            <div class="otp-code">{verify}</div>
            <p>รหัสนี้ใช้ได้ครั้งเดียวเท่านั้นและจะหมดอายุในไม่ช้า.</p>
            <p>หากคุณไม่ได้ขอรหัสนี้ กรุณาเปลี่ยนรหัสผ่านของคุณทันทีเพื่อความปลอดภัยของบัญชีของคุณ.</p>
            <p>ขอบคุณที่ใช้บริการ Open Collections!</p>
            <br>
            <p>โปรดทราบ<br>
                - OpenCollections จะไม่มีวันขอข้อมูลส่วนตัว ชื่อผู้ใช้ รหัสผ่าน และรหัส OTP ทาง SMS ทางโทรศัพท์ อีเมล จดหมาย หรือช่องทางอื่นๆ เพื่อความปลอดภัยของคุณ โปรดเก็บข้อมูลส่วนตัวของคุณเป็นความลับอย่างเคร่งครัด.<br>
                - นี่คืออีเมลที่สร้างขึ้นโดยอัตโนมัติ หากคุณมีคำถามเพิ่มเติม โปรดติดต่อที่สาขา กรุณาอย่าตอบกลับอีเมลนี้เพื่อความปลอดภัยของคุณและป้องกันการกระทำที่ไม่ชอบด้วยกฎหมาย.<br>
                - เอกสารนี้มีข้อมูลส่วนบุคคลตามพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล พ.ศ. 2562 (2019) ดังนั้น โปรดลบและ/หรือทำลายเอกสารดังกล่าวหากคุณไม่ได้เป็นผู้รับที่ตั้งใจไว้.<br>
                - คุณได้อ่านและรับทราบประกาศความเป็นส่วนตัวอย่างถี่ถ้วนในเว็บไซต์ของกลุ่มธุรกิจการเงิน เว็บไซต์ Kiatnakin Phatra > ประกาศความเป็นส่วนตัวหรือช่องทางอื่นๆ.</p>
            <br>
            <p>ด้วยความเคารพ,</p>
            <p>ทีมงาน Open Collections</p>
        </section>

        <footer>
            &copy; 2024 Open Collections. All rights reserved.
        </footer>

    </div>
</body>

</html>