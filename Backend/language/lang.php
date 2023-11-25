<?php
    $lang = isset($_COOKIE['lang']) ? $_COOKIE['lang'] : 'en';

    if ($lang == "th") {
        $abstract = "บทคัดย่อ";
        $access = "ยอมรับ";
        $account = "บัญชี";
        $admin = "ผู้ดูแล";
        $advisor = "ที่ปรึกษา";
        $approve = "อนุมัติ";
        $approve_dashboard = "แดชอนุมัติ";
        $approve_list = "รายการอนุมัติ";
        $approve_menu_detail = "รายการขออนุมัติโครงงาน";
        $approve_requests = "คำขออนุมัติโครงงาน";
        $author = "ผู้เขียน";
        $back = "ย้อนกลับ";
        $back_to_sign_in = "กลับไปหน้าลงทะเบียน?";
        $back_to_signup = "กลับไปยังหน้าสมัครสมาชิก";
        $cancel = "ยกเลิก";
        $confirm_password = "ยืนยันรหัสผ่าน";
        $contact_us = "ติดต่อเรา";
        $contact_us_detail = "แจ้งปัญหาการใช้งาน";
        $continue = "ดำเนินการต่อ";
        $create = "สร้าง";
        $create_account = "สมัครสมาชิก";
        $create_account_detail = "โปรดทราบว่าจำเป็นต้องมีการยืนยันอีเมลเพื่อสมัคร อีเมลของคุณจะถูกใช้เพื่อยืนยันตัวตนของคุณเพื่อความปลอดภัยเท่านั้น";
        $created_at = "สร้างเมื่อ";
        $create_department = "สร้างแผนก";
        $create_faculty = "สร้างคณะ";
        $create_institute = "สร้างสถานศึกษา";
        $create_major = "สร้างสาขาวิชา";
        $create_new_user = "สร้างผู้ใช้ใหม่";
        $create_project = "สร้างโครงงาน";
        $create_project_type = "สร้างประเภทโครงงาน";
        $create_request = "แจ้งปัญหา";
        $dash_department = "แดชแผนกวิชา";
        $dash_faculty = "แดชคณะ";
        $dash_institute = "แดชสถานศึกษา";
        $dash_major = "แดชเอก";
        $dash_project = "แดชโปรเจค";
        $dash_project_type = "แดชประเภทโปรเจค";
        $dash_request = "แดชแจ้งปัญหา";
        $dash_user = "แดชผู้ใช้";
        $degree = "วุฒิการศึกษา";
        $delete = "ลบ";
        $delete_account = "ลบบัญชี";
        $delete_department = "ลบแผนก";
        $delete_faculty = "ลบคณะ";
        $delete_institute = "ลบสถานศึกษา";
        $delete_major = "ลบสาขาวิชา";
        $delete_project = "ลบโครงงาน";
        $delete_project_type = "ลบประเภทโครงงาน";
        $delete_request = "ลบรายการแจ้งปัญหา";
        $department = "แผนกวิชา";
        $department_dashboard = "แดชแผนกวิชา";
        $department_list = "รายการแผนกวิชา";
        $department_menu_detail = "จัดการรายการแผนกวิชาทั้งหมด";
        $dept = "แผนกวิชา";
        $detail = "รายละเอียด";
        $Don_t_have_an_account = "ไม่มีบัญชี?";
        $download = "ดาวน์โหลดไฟล์";
        $draft = "ร่าง";
        $edit_detail = "แก้ไขรายละเอียด";
        $edit_picture = "แก้ไขรูปภาพ";
        $edit_project_detail = "แก้ไขรายละเอียดโครงงาน";
        $edit_project_file = "แก้ไขไฟล์โครงงาน";
        $email = "อีเมล์";
        $faculty = "คณะ";
        $faculty_dashboard = "แดชคณะ";
        $faculty_label = "คณะ";
        $faculty_list = "รายชื่อคณะ";
        $faculty_menu_detail = "จัดการรายการคณะทั้งหมด";
        $favorite = "รายการโปรด";
        $file = "ไฟล์โครงงาน";
        $forget_your_password = "ลืมรหัสผ่าน?";
        $home = "หน้าหลัก";
        $insert = "สร้าง";
        $institute = "สถานศึกษา";
        $institute_dashboard = "แดชสถานศึกษา";
        $institute_list = "รายชื่อสถานศึกษา";
        $institute_menu_detail = "จัดการรายการสถานศึกษาทั้งหมด";
        $last_update = "แก้ไขล่าสุด";
        $login = "เข้าระบบ";
        $major = "สาขาวิชา";
        $major_and_degree = "สาขาวิชาและ วุฒิการซึกษา";
        $major_and_degree_menu_detail = "จัดการรายการสาขาวิชาและ วุฒิการซึกษาทั้งหมด";
        $major_dashboard = "แดชเอก";
        $major_list = "รายชื่อเอก";
        $management_your_project = "จัดการรายการโครงงานของฉัน";
        $my_favorite = "รายการโปรดของฉัน.";
        $my_project = "โครงงานของฉัน";
        $name = "ชื่อ";
        $no_data = "ไม่มีข้อมูล";
        $normal_user = "ผู้ใช้ทั่วไป";
        $not_approve = "ไม่อนุมัติ";
        $not_approve_detail = "รายละเอียดการไม่อนุมัติ";
        $note = "หมายเหตุ";
        $officer = "เจ้าหน้าที่";
        $open_collections = "Open Collections";
        $other = "อื่น ๆ";
        $password = "รหัสผ่าน";
        $please_select_advisor = "กรุณาเลือกผู้เขียน";
        $please_select_dept = "กรุณาเลือกแผนกวิชา";
        $please_select_faculty = "กรุณาเลือกคณะ";
        $please_select_ins = "กรุณาเลือกสถานศึกษา";
        $please_select_major = "กรุณาเลือกสาขาวิชา";
        $please_select_project_type = "กรุณาเลือกประเภทโครงงาน";
        $policy = "ข้อตกลงการใช้งาน";
        $policy_1 = "1. การให้ข้อมูลส่วนตัว";
        $policy_11 = "1.1 ผู้ใช้ตกลงที่จะให้ข้อมูลส่วนตัวที่ถูกต้องและครบถ้วนตามที่ระบบต้องการในขั้นตอนการลงทะเบียนหรือการใช้งานระบบที่เกี่ยวข้อง";
        $policy_12 = "1.2 ผู้ใช้รับทราบว่าการเผยแพร่งานวิจัยอาจทำให้ข้อมูลและผลงานวิจัยของตนเปิดเผยแก่สาธารณะ และผู้ใช้ยินยอมรับผิดชอบในการเผยแพร่งานวิจัยดังกล่าว";
        $policy_2 = "2. การเผยแพร่งานวิจัย";
        $policy_21 = "2.1 ผู้ใช้ตกลงที่จะให้สิทธิ์ให้ระบบเผยแพร่งานวิจัยที่ผู้ใช้สร้างขึ้นสู่สาธารณะ";
        $policy_22 = "2.2 ผู้ใช้รับทราบว่าการเผยแพร่งานวิจัยอาจทำให้ข้อมูลและผลงานวิจัยของตนเปิดเผยแก่สาธารณะ และผู้ใช้ยินยอมรับผิดชอบในการเผยแพร่งานวิจัยดังกล่าว";
        $policy_3 = "3. การอำนาจในการแก้ไขโดยไม่แจ้งล่วงหน้า";
        $policy_31 = "3.1 ผู้ใช้ตกลงและยอมรับว่าหน่วยงานหรือผู้ให้บริการอาจมีสิทธิ์แก้ไขหรือแก้ไขข้อมูลที่เกี่ยวข้องกับงานวิจัยของผู้ใช้โดยไม่ต้องแจ้งให้ทราบล่วงหน้า";
        $policy_32 = "3.2 ผู้ใช้รับทราบว่าการแก้ไขโดยไม่แจ้งล่วงหน้าอาจมีผลกระทบต่องานวิจัยและข้อมูลที่เกี่ยวข้อง และผู้ใช้ยินยอมรับผิดชอบในผลที่เกิดขึ้นจากการแก้ไขดังกล่าว";
        $policy_4 = "4. ความรับผิดชอบ";
        $policy_41 = "4.1 ผู้ใช้รับทราบและยินยอมว่าผู้ให้บริการไม่รับผิดชอบต่อความเสียหายที่เกิดขึ้นจากการใช้งานระบบหรือการเผยแพร่งานวิจัย";
        $policy_42 = "4.2 ผู้ใช้รับทราบและยินยอมว่าผู้ให้บริการไม่รับประกันความถูกต้อง ความสมบูรณ์ ความน่าเชื่อถือ หรือประสิทธิภาพของข้อมูลหรืองานวิจัยที่เผยแพร่ผ่านระบบ";
        $policy_end = "โดยที่ผู้ใช้เข้าใจและยอมรับข้อตกลงดังกล่าว การใช้งานระบบถือว่าเป็นการยินยอมและยอมรับข้อตกลงและข้อกำหนดทั้งหมดที่ระบบกำหนด";
        $policy_sub = "โดยเข้าถึงและใช้งานระบบ Open Collections (ต่อไปนี้จะเรียกว่า 'ระบบ') ซึ่งจัดทำโดย [ชื่อบริษัท/หน่วยงาน] (ต่อไปนี้จะเรียกว่า 'ผู้ให้บริการ') ผู้ใช้งาน (ต่อไปนี้จะเรียกว่า 'ผู้ใช้') ต้องทำการยินยอมและปฏิบัติตามข้อตกลงดังต่อไปนี้:";
        $policy_title = "ข้อตกลงการใช้งานระบบ Open Collections";
        $profile_picture = "ภาพโปรไฟล์";
        $project = "โปรเจค";
        $project_dashboard = "แดชโปรเจค";
        $project_list = "รายการโปรเจค";
        $project_menu_detail = "จัดการรายการโครงงานทั้งหมด";
        $project_type = "ประเภทโครงงาน";
        $project_type = "ประเภทโปรเจค";
        $project_type_dashboard = "แดชประเภทโปรเจค";
        $project_type_list = "รายการประเภทโปรเจค";
        $project_type_menu_detail = "จัดการรายการประเภทโครงงานทั้งหมด";
        $release = "เผยแพร่";
        $release_date = "วันที่เผยแพร่";
        $request = "แจ้งปัญหา";
        $request_dashboard = "แดชแจ้งปัญหา";
        $request_list = "รายการแจ้งปัญหา";
        $request_menu_detail = "จัดการรายการแจ้งปัญหาทั้งหมด";
        $request_user = "แจ้งปัญหาทั้งหมด";
        $reset_your_password = "รีเซ็ตรหัสผ่านของคุณ";
        $reset_your_password_detail = "ป้อนที่อยู่อีเมลของคุณแล้วเราจะส่งคำแนะนำในการรีเซ็ตรหัสผ่านไปให้คุณ";
        $role = "บทบาท";
        $search_some_thing = "ค้นหาบางสิ่ง...";
        $sent = "ขออนุมัติเผยแพร่โครงงาน";
        $sign_in = "เข้าสู่ระบบ";
        $sign_out = "ออกจากระบบ";
        $sign_out_your_account = "ออกจากระบบบัญชีของฉัน";
        $sign_up = "สมัครสมาชิกเลย";
        $status = "สถานะ";
        $support = "สนับสนุน";
        $tel = "เบอร์โทรศัพท์";
        $title = "ชื่อเรื่อง";
        $total_user = "ผู้ใช้ทั้งหมด";
        $type = "ประเภท";
        $unfavorite = "ลบออกจากรายการโปรด";
        $update = "แก้ไข";
        $update_department = "แก้ไขแผนก";
        $update_email = "แก้ไขอีเมล์";
        $update_faculty = "แก้ไขคณะ";
        $update_institute = "แก้ไขสถานศึกษา";
        $update_major = "แก้ไขสาขาวิชา";
        $update_password = "แก้ไขรหัสผ่าน";
        $update_project = "แก้ไขโครงงาน";
        $update_project_file = "แก้ไขไฟล์โครงงาน";
        $update_project_type = "แก้ไขประเภทโครงงาน";
        $update_role = "แก้ไขบทบาทผู้ใช้";
        $update_tel = "แก้ไขเบอร์โทรศัพท์";
        $update_username = "แก้ไขชื่อผู้ใช้";
        $user = "ผู้ใช้";
        $user_dashboard = "แดชผู้ใช้";
        $user_list = "รายชื่อผู้ใช้";
        $user_menu_detail = "จัดการรายการผู้ใช้ทั้งหมด";
        $username = "ชื่อผู้ใช้";
        $username_email = "ชื่อผู้ใช้ / อีเมล์";
        $verification = "การยืนยันตัวตน";
        $verification_detail = "กรุณาตรวจสอบกล่องข้อความในบัญชีอีเมล์ของท่าน";
        $verify_email = "ยืนยันอีเมล์";
        $view = "อ่าน";
        $wait = "รออนุมัติ";
        $welcome_back = "ยินดีต้อนรับกลับมา";
        $you_ll_lose_your_information = "ข้อมูลทั้งหมดของคุณจะถูกลบ";
        $your_account = "บัญชีของคุณ";
    } else if ($lang == "en") {
        $abstract = "Abstract";
        $access = "Access";
        $account = "Account";
        $admin = "Admin";
        $advisor = "Advisor";
        $approve = "Approve";
        $approve_dashboard = "Approve Dashboard";
        $approve_list = "Approve List";
        $approve_menu_detail = "approve requests.";
        $approve_requests = "approve requests.";
        $author = "Author";
        $back = "Back";
        $back_to_sign_in = "Back to sign in?";
        $back_to_signup = "Back to signup";
        $cancel = "Cancel";
        $confirm_password = "Confirm Password";
        $contact_us = "Contact Us";
        $contact_us_detail = "Contact Us.";
        $continue = "Continue";
        $create = "Create";
        $create_account = "Create account";
        $create_account_detail = "Please note that Email verification is required for Signup. Your Email will only be used to verify your identity for security purposes.";
        $created_at = "Created at";
        $create_department = "Create Department";
        $create_faculty = "Create Faculty";
        $create_institute = "Create Institute";
        $create_major = "Create Major";
        $create_new_user = "Create New User";
        $create_project = "Create Project";
        $create_project_type = "Create Project Type";
        $create_request = "Create Request";
        $dash_department = "Dash Department";
        $dash_faculty = "Dash Faculty";
        $dash_institute = "Dash Institute";
        $dash_major = "Dash Major";
        $dash_project = "Dash Project";
        $dash_project_type = "Dash Project Type";
        $dash_request = "Dash Request";
        $dash_user = "Dash User";
        $degree = "Degree";
        $delete = "Delete";
        $delete_account = "Delete account";
        $delete_account = "Delete Account";
        $delete_department = "Delete Departmenft";
        $delete_faculty = "Delete Faculty";
        $delete_institute = "Delete Institute";
        $delete_major = "Delete Major";
        $delete_project = "Delete Project";
        $delete_project_type = "Delete Project Type";
        $delete_request = "delete Request";
        $department = "Department";
        $department_dashboard = "Department Dashboard";
        $department_list = "Department List";
        $department_menu_detail = "Manage all department.";
        $dept = "Department";
        $detail = "Detail";
        $Don_t_have_an_account = "Don't have an account?";
        $download = "Download";
        $draft = "Draft";
        $edit_detail = "Edit Detail";
        $edit_picture = "Edit Picture";
        $edit_project_detail = "Edit Project Detail";
        $edit_project_file = "Edit File";
        $email = "Email";
        $faculty = "Faculty";
        $faculty_dashboard = "Faculty Dashboard";
        $faculty_label = "Faculty";
        $faculty_list = "Faculty List";
        $faculty_menu_detail = "Manage all faculty.";
        $favorite = "Favorite";
        $file = "File";
        $forget_your_password = "Forget your password?";
        $home = 'Home';
        $insert = "Insert";
        $institute = "Institute";
        $institute_dashboard = "Institute Dashboard";
        $institute_list = "Institute List";
        $institute_menu_detail = "Manage all institute.";
        $last_update = "Last Update";
        $login = 'Login';
        $major = "Major";
        $major_and_degree = "Major and degree";
        $major_and_degree_menu_detail = "Manage all major.";
        $major_dashboard = "Major Dashboard";
        $major_list = "Major List";
        $management_your_project = "Management your project.";
        $my_favorite = "My favorite.";
        $my_project = "My Project";
        $name = "Name";
        $no_data = "No Data";
        $normal_user = "Normal User";
        $not_approve = "Not";
        $not_approve_detail = "Not Approve Detail";
        $note = "Note";
        $officer = "Officer";
        $open_collections = "Open Collections";
        $other = "Other";
        $password = "Password";
        $please_select_advisor = "Please select Advisor";
        $please_select_dept = "Please select Department";
        $please_select_faculty = "Please select Faculty";
        $please_select_ins = "Please select Institute";
        $please_select_major = "Please select Major";
        $please_select_project_type = "Please select Project type";
        $policy = "Policy";
        $policy_1 = "1. Providing personal information";
        $policy_11 = "1.1 The user agrees to provide accurate and complete personal data as required by the system during registration or use of the relevant system.";
        $policy_12 = "1.2 Users acknowledge that publishing research may cause their data and research results to be made public. and the user accepts responsibility for publishing such research";
        $policy_2 = "2. Publication of research";
        $policy_21 = "2.1 The user agrees to grant permission for the system to publish user-generated research to the public.";
        $policy_22 = "2.2 Users acknowledge that publishing research may make their data and research results available to the public. and the user accepts responsibility for publishing such research";
        $policy_3 = "3. Authority to make changes without prior notice";
        $policy_31 = "3.1 The user agrees and accepts that the agency or service provider may have the right to edit or modify data related to the user's research without prior notice.";
        $policy_32 = "3.2 The user acknowledges that modifications without prior notice may affect the research and related information. and the user accepts responsibility for the results arising from such modifications";
        $policy_4 = "4. Responsibility";
        $policy_41 = "4.1 The user acknowledges and agrees that the service provider is not responsible for damages arising from the use of the system or the dissemination of research.";
        $policy_42 = "4.2 The user acknowledges and agrees that the service provider does not guarantee the accuracy, completeness, reliability. or the efficiency of information or research published through the system";
        $policy_end = "where the user understands and accepts the said agreement. Using the system is considered consent and acceptance of all terms and conditions set forth by the system.";
        $policy_sub = "By accessing and using the Open Collections system (hereinafter referred to as the 'System') provided by [company/organization name] (hereinafter referred to as the 'System'), The user (hereinafter referred to as the 'Service Provider') must agree to and abide by the following terms:";
        $policy_title = "Open Collections Terms of Use";
        $profile_picture = "Profile Picture";
        $project = "Project";
        $project_dashboard = "Project Dashboard";
        $project_list = "Project List";
        $project_menu_detail = "Manage all project.";
        $project_type = "Project Type";
        $project_type = "Project type";
        $project_type_dashboard = "Project Type Dashboard";
        $project_type_list = "Project Type List";
        $project_type_menu_detail = "Manage all project type.";
        $release = "Release";
        $release_date = "Release Date";
        $request = "Request";
        $request_dashboard = "Request Dashboard";
        $request_list = "Request List";
        $request_menu_detail = "Manage all request.";
        $request_user = "Total Request";
        $reset_your_password = "Reset Your password";
        $reset_your_password_detail = "Enter your email address and we will send you instructions to reset your password.";
        $role = "Role";
        $search_some_thing = "Search some thing...";
        $sent = "Sent";
        $sign_in = "Sign In";
        $sign_out = "Sign Out";
        $sign_out_your_account = "Sign out your account.";
        $sign_up = "Sign up";
        $status = "Status";
        $support = "Support";
        $tel = "Tel.";
        $title = "Title";
        $total_user = "Total user";
        $type = "Type";
        $unfavorite = "Unfavorite";
        $update = "Update";
        $update_department = "Update Department";
        $update_email = "Update Email";
        $update_faculty = "Update Faculty";
        $update_institute = "Update Institute";
        $update_major = "Update Major";
        $update_password = "Update Password";
        $update_project = "Update Project";
        $update_project_file = "Update Project File";
        $update_project_type = "Update Project Type";
        $update_role = "Update Role";
        $update_tel = "Update Tel.";
        $update_username = "Update Username";
        $user = "User";
        $user_dashboard = "User Dashboard";
        $user_list = "User List";
        $user_menu_detail = "Manage all user.";
        $username = "Username";
        $username_email = "Username / Email";
        $verification = "Verification";
        $verification_detail = "Please check your email.";
        $verify_email = "Verify Email";
        $view = "View";
        $wait = "Wait";
        $welcome_back = "Welcome back";
        $you_ll_lose_your_information = "You'll lose your, information.";
        $your_account = "Your Account";
    }
?>