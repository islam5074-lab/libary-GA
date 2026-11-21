# libary-GA

نظام مكتبة: REST API بـ Laravel 13 (Staff, Customers, Categories, Books, Borrowings) مع Sanctum و guards منفصلة.

## التشغيل
```
composer install
php artisan migrate:fresh --seed
php artisan serve
```
الـ URL: http://localhost:8000/api

## بيانات الاختبار (من الـ seeder)
| النوع | الدخول | الباسورد |
|---|---|---|
| Staff | ali2@gmail.com | 12345678 |
| Customer | 0911111111 | 12345678 |
| Customer | 0922222222 | 12345678 |

كل request لازم فيه Header: `Accept: application/json`

## الـ Endpoints
| Method | URL | Token |
|---|---|---|
| POST | /api/staff/login | - |
| POST | /api/customer/login | - |
| POST | /api/customer (sign up + token) | - |
| GET/POST/PUT/DELETE | /api/staff , /api/staff/{id} | staff |
| GET | /api/staff-me , POST /api/staff-logout | staff |
| POST/PUT/DELETE | /api/category , /api/book | staff |
| GET | /api/category , /api/book (?search= & ?category_id=) | أي token |
| GET | /api/customer , /api/customer/{id} | staff |
| PUT | /api/borrowings/return | staff |
| GET | /api/borrowings/all (?is_returned=0) , /api/borrowings/overdue | staff |
| GET/POST | /api/borrowings | customer |
| DELETE | /api/borrowings/{book_id} | customer |
| GET | /api/customer-me , POST /api/customer-logout | customer |

## القواعد
- تاريخ الاستلام ما يكون قبل اليوم، وتاريخ الإرجاع بعده (422).
- ما يتستلف نفس الكتاب في تواريخ متداخلة (422).
- حد أقصى 3 كتب مفتوحة لكل زبون (422).
- ما يتحذفش category فيها كتب ولا كتاب له سجل استلاف (409).
- BookResource فيه `is_available`.

## Postman
استورد `libary-GA.postman_collection.json`، سجل دخول Staff و Customer من فولدر Auth (التوكن يتخزن لوحده)، وبعدها جرب أي request.
