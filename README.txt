1. Up file PHP lên host của bạn.
2. Đăng ký 1 tài khoản ở https://zapier.com/
3. Vào link sau tạo 1 zap mới: https://zapier.com/zapbook/facebook-groups/webhook/

Hướng dẫn tạo zap:

* Phần Trigger:
1. Chọn Facebook Group
2. Chọn New Post
3. Chọn nhóm của bạn muốn kiểm tra hashtag

* Phần Action:
1. Chọn Webhooks
2. Chọn phương thức POST
3. Trong phần template, chỉ cần trỏ URL vào file PHP mà bạn đã up lên host. Payload type chọn "form".