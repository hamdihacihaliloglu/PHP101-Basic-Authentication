-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Anamakine: 127.0.0.1
-- Üretim Zamanı: 17 Nis 2022, 00:00:37
-- Sunucu sürümü: 10.4.20-MariaDB
-- PHP Sürümü: 8.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `authentication`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `ayarlar`
--

CREATE TABLE `ayarlar` (
  `id` tinyint(1) UNSIGNED NOT NULL,
  `SiteAdi` varchar(50) NOT NULL,
  `SiteTitle` varchar(60) NOT NULL,
  `SiteDescription` varchar(150) NOT NULL,
  `SiteKeywords` varchar(255) NOT NULL,
  `SiteCopyright` varchar(255) NOT NULL,
  `SiteEmailAdresi` varchar(50) NOT NULL,
  `SiteEmailSifre` varchar(50) NOT NULL,
  `SiteEmailHostAdresi` varchar(255) NOT NULL,
  `SiteLinki` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `ayarlar`
--


-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `uyeler`
--

CREATE TABLE `uyeler` (
  `id` int(10) UNSIGNED NOT NULL,
  `EmailAdresi` varchar(50) NOT NULL,
  `Ad` varchar(60) NOT NULL,
  `Soyad` varchar(60) NOT NULL,
  `Sifre` varchar(150) NOT NULL,
  `Durumu` tinyint(1) NOT NULL,
  `SilinmeDurumu` tinyint(1) NOT NULL,
  `KayitIPAdresi` varchar(30) NOT NULL,
  `AktivasyonKodu` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `uyeler`
--


--
-- Tablo için tablo yapısı `yoneticiler`
--

CREATE TABLE `yoneticiler` (
  `id` int(10) UNSIGNED NOT NULL,
  `KullaniciAdi` varchar(100) NOT NULL,
  `Sifre` varchar(150) NOT NULL,
  `IsimSoyisim` varchar(150) NOT NULL,
  `EmailAdresi` varchar(150) NOT NULL,
  `TelefonNumarasi` varchar(15) NOT NULL,
  `SilinemeyecekYoneticiDurumu` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Tablo döküm verisi `yoneticiler`
--


--

--
-- Tablo için indeksler `ayarlar`
--
ALTER TABLE `ayarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `uyeler`
--
ALTER TABLE `uyeler`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `ayarlar`
--
ALTER TABLE `ayarlar`
  MODIFY `id` tinyint(1) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Tablo için AUTO_INCREMENT değeri `uyeler`
--
ALTER TABLE `uyeler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
