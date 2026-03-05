Link ERD : https://dbdiagram.io/d/69a6fd3ca3f0aa31e1ad45c2

Pseudocode

START

User membuka aplikasi

IF user belum login THEN
    tampilkan halaman login / register
END IF

IF user register THEN
    input: name, email, password, contact
    assign default role = customer
    simpan ke table User
END IF

IF user login THEN
    validasi email dan password
    IF valid THEN
        redirect ke dashboard sesuai role
    ELSE
        tampilkan pesan error
    END IF
END IF

ADMIN login

ADMIN membuka menu Film

IF tambah film THEN
    input:
        title
        description
        duration
        rating
        actors
        director
        production
        status

    simpan ke table Film
END IF

IF pilih genre film THEN
    insert ke table Genre_Film
END IF

IF edit film THEN
    update data Film
END IF

IF hapus film THEN
    delete film
END IF

ADMIN login

ADMIN membuka menu Film

IF tambah film THEN
    input:
        title
        description
        duration
        rating
        actors
        director
        production
        status

    simpan ke table Film
END IF

IF pilih genre film THEN
    insert ke table Genre_Film
END IF

IF edit film THEN
    update data Film
END IF

IF hapus film THEN
    delete film
END IF

ADMIN membuka menu Studio

IF tambah studio THEN
    input:
        type
        name
        capacity
        status

    simpan ke table Studio
END IF

GENERATE seat berdasarkan capacity

FOR setiap baris kursi
    buat seat:
        row_label
        seat_number
        seat_code
    simpan ke table Seat
END FOR

ADMIN membuka menu Schedule

input:
    film_id
    studio_id
    schedule_date
    start_time
    end_time
    ticket_price

simpan ke table Schedule

CUSTOMER memilih film

tampilkan daftar schedule

CUSTOMER memilih:
    schedule
    seat

cek apakah seat tersedia

IF seat tersedia THEN
    buat record Bookings
        customer_id
        booking_type = online
        status = pending

    simpan tiket ke Ticket_Bookings:
        booking_id
        schedule_id
        seat_id
        price_at_sale

    hitung total_amount
    update Bookings.total_amount
ELSE
    tampilkan pesan "Seat sudah dipesan"
END IF

CUSTOMER memilih menu FnB

input:
    quantity

simpan ke table FnB_Bookings:
    booking_id
    fnb_id
    quantity
    price_at_sale

update total_amount booking

CUSTOMER memilih metode pembayaran

buat record Payment

IF pembayaran berhasil THEN
    update:
        Payment.paid_status = success
        Bookings.status = paid

    generate QR redeem
    simpan ke Bookings.qr_redeem
ELSE
    Payment.paid_status = failed
END IF

Staff scan QR Code

ambil data booking berdasarkan qr_redeem

IF status = paid AND status_redeem = not_used THEN
    ubah status_redeem = used
    izinkan customer masuk
ELSE
    tampilkan pesan "QR tidak valid"
END IF

CASHIER login

buat record Offline_Sales

CASHIER memilih:
    schedule
    seat

cek ketersediaan seat

IF tersedia THEN
    simpan ke Offline_Ticket_Sales
END IF

CASHIER bisa menambahkan FnB

simpan ke Offline_FnB_Sales

hitung total_amount

buat Payment

IF pembayaran berhasil THEN
    transaksi selesai
END IF

ADMIN membuka menu laporan

ambil data dari:
    Bookings
    Offline_Sales
    Payment
    Ticket_Bookings
    FnB_Bookings

hitung:
    total penjualan tiket
    total penjualan FnB
    total transaksi online
    total transaksi offline

tampilkan laporan