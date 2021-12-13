<?php

return [
    // Header
    'list'       => 'ホームページ',
    'language'   => '言語',
    'share'      => '共有するには',
    'logout'     => 'ログアウト',
    'login'      => 'ログイン',
    'register'   => '登録',
    'English'    => '英語',
    'Japanese'   => '日本',
    'Vietnamese' => 'ベトナム語',
    'share'      => '共有するには',
    'ShareFriend' => '購入リストを友達と共有する',

    // Product Index
    'ShoppingList' => '購入リスト',
    'all'          => '全て',
    'search'       => '検索',
    'findSearch'   => '検索したいものを入力してください!',
    'AddProduct'   => 'その他の製品',
    'print'        => 'リストを印刷する',
    'image'        => '画像',
    'ProductName'  => '製品名',
    'description'  => '製品説明',
    'category'     => '製品ポートフォリオ',
    'edit'         => '編集',
    'delete'       => '消去',
    'WannaDelete'  => '消去してもよろしいですか？',
    'ExportExcel'  => 'Excelにエクスポートしますか？',
    'msgProduct'   => '製品はありません',
    'completed'    => '完了',
    'DeleteAll'    => '選択を削除します',
    'TotalProduct' => '選択された製品の総数',
    'undo'         => '元に戻す',
    'msgTotalProduct' => 'まだ商品が見つかりませんまたは購入されていません', 

    // Share Mail 
    'ShareMail'  => '共有したいGmailを入力してください',
    'yourMail'   => 'メールアドレスを入力',
    'fillMail'   => 'メールアドレスを入力して',
    'NoteShare'  => '見たいリストや購入リストを友達と共有しましょう',
    'Send'       => '送信',

    // Create Product
    'reset'      => '再入力',
    'msgTitle'   => '製品名を入力してください',
    'msgContent' => '製品の説明を記入してください',
    'msgSelect'  => 'カテゴリを選んでください',
    'choose'     => '選ぶ',
    'addCat'     => '商品を追加する前にカテゴリを作成してください!',

    // Edit Product
    'UpdateProduct' => '使用済み製品',
    'update'        => 'アップデート',
    
    // Category
    'CategoryName'  => '名前リスト',
    'save'          => '保存する',
    'CategoryList'  => 'カテゴリのリスト',
    'function'      => '関数',
    
    // Login, Register
    'username' => 'アカウント',
    'password' => 'パスワード',
    'forgot'   => 'パスワードをお忘れですか？',
    'nameIsRequired'  => 'お名前を入力してください',
    'emailIsRequired' => 'メールアドレスを入力してください',
    'correctMail'     => '正しいタイプのメールアドレスを入力してください',
    'welcome'         => 'ショッピングリストマネージャーへようこそ！',

    //Xác Nhận Qua Gmail
    'ConfirmGmail'      => 'Gmailの確認',
    'SendConfirmation'  => '確認を送信しますか？',
    'CreateAccount'     => '新しいアカウントを作成する',
    'fullname'          => '名前と苗字',
    'Re_EnterPassword'  => 'パスワードを入力してください',
    'back'              => '戻る',

    // Information.blade
    'YourInfor'       => 'あなたの情報',
    'NoInfor'         => '情報なし',
    'CurrentPassword' => '現在のパスワード？',
    'change'          => '変化する',
    'CannotChange'    => 'パスワードを変更できません',
    'ChangeYourPassword'      => 'パスワードを変更する',
    'CurrentPasswordPlease'   => '現在のパスワードを入力してください',
    'PasswordIsRequired'      => 'パスワードが必要',
    'NeedAtLeast6Characters'  => 'パスワードには6文字以上必要です。',
    '2PasswordsMustBeTheSame' => '2つのパスワードが一致する必要があります',

    // ConfirmMail.blade
    'ClickOnTheLink'         => 'リンクをクリックしてください',
    'RequestToGetAPassword'  => 'パスワードのリクエストを送信しました',   

    // AuthController
    'WrongAccount'     => '間違ったアカウントまたはユーザー名',
    'EmailAlreadyUsed' => 'すでに使用されているメールアドレス、別のメールアドレスを入力してください',
    'Error401'         => '401.エラー',

    // InformationController
    'NotBlank'           => '空白のままにしたり、現在の名前を複製したりしないでください。!',
    'UpdateSuccessfully' => '正常に更新されました !',

    // ResetPassword.blade + ResetPasswordController
    'YourNewPassword'         => 'パスワードを入力してください',
    'Successfully_CheckGmail' => 'リクエストは正常に送信されました。Gmailをチェックして確認してください。',
    'Error_NoInfor'           => 'エラーが発生しました。情報が見つかりませんでした。',
    'PasswordChanged'         => 'パスワードが無事変更されました!',
    'Error_ChangingPassword'  => 'パスワードの変更中にエラーが発生しました。',

    // CategoryController
    'AddSuccessfully'    => '追加に成功しました!',
    'EditSuccessfully'   => '編集に成功しました!',
    'DeleteSuccessfully' => '正常に削除されました!',

    //ShoppingListController
    'SharedSuccessfully' => 'リストを正常に共有しました!',
    'BuyProduct'         => '購入する製品',
    
    // ShareMail.blade 
    'OrderConfirmation' => '注文確認',
    'AutomatedEmail'    => 'これは、顧客が共有するときの自動メールです。 このメールには返信しないでください。',
    'ListShared'        => '次の情報であなたのために共有されたリスト:',
    'SharerInformation' => '共有者情報',

];