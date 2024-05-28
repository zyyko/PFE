<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Styled Form</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }

        form {
            background-color: #fff;
            padding: 40px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 15px;
        }

        select,
        input[type="checkbox"],
        textarea,
        input[type="file"],
        input[type="submit"],
        input[type="text"],
        input[type="number"] {
            margin-bottom: 20px;
            width: 100%;
            padding: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            box-sizing: border-box;
            font-size: 18px;
        }

        input[type="checkbox"] {
            width: auto;
            margin-bottom: 10px;
        }

        input[type="radio"] {
            width: auto;
            margin-bottom: 10px;
        }

        span {
            margin-left: 10px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>

    <form action="{{ route('Publier.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <span>Title</span><br>
        <input type="text" id="title" name="title">
        <label for="region">Region</label>
        <select id="region" name="region">
            <option value="Agadir">Agadir</option>
            <option value="Casablanca">Casablanca</option>
            <option value="Fes">Fes</option>
            <option value="Marrakech">Marrakech</option>
            <option value="Meknes">Meknes</option>
            <option value="Oujda">Oujda</option>
            <option value="Rabat">Rabat</option>
            <option value="Salé">Salé</option>
            <option value="Tangier">Tangier</option>
            <option value="Tétouan">Tétouan</option>
            <option value="Al Hoceima">Al Hoceima</option>
            <option value="Beni Mellal">Beni Mellal</option>
            <option value="El Jadida">El Jadida</option>
            <option value="Errachidia">Errachidia</option>
            <option value="Nador">Nador</option>
            <option value="Ouarzazate">Ouarzazate</option>
            <option value="Settat">Settat</option>
            <option value="Taza">Taza</option>
            <option value="Larache">Larache</option>
            <option value="Kénitra">Kénitra</option>
            <option value="Khémisset">Khémisset</option>
            <option value="Berkane">Berkane</option>
            <option value="Guéliz">Guéliz</option>
            <option value="Mohammedia">Mohammedia</option>
            <option value="Khouribga">Khouribga</option>
            <option value="Laâyoune">Laâyoune</option>
            <option value=" Safi"> Safi</option>
            <option value="El Kelâa des Sraghna">El Kelâa des Sraghna</option>
            <option value="Tamanar">Tamanar</option>
            <option value="Oued Zem">Oued Zem</option>
            <option value="Driouch">Driouch</option>
            <option value="Jerada">Jerada</option>
            <option value="Tiflet">Tiflet</option>
            <option value="Azemmour">Azemmour</option>
            <option value="Sidi Kacem">Sidi Kacem</option>
            <option value="Midelt">Midelt</option>
            <option value="Khénifra">Khénifra</option>
            <option value="Sidi Slimane">Sidi Slimane</option>
            <option value="Settat">Settat</option>
            <option value="Skhirat">Skhirat</option>
            <option value="Témara">Témara</option>
            <option value="Fquih Ben Salah">Fquih Ben Salah</option>
            <option value="Béni Mellal">Béni Mellal</option>
            <option value="Taounate">Taounate</option>
            <option value="Martil">Martil</option>
            <option value="Mtahla">Mtahla</option>
            <option value="Boujdour">Boujdour</option>
            <option value="Dakhla">Dakhla</option>
            <option value="Boulmane">Boulmane</option>
            <option value="Tinghir">Tinghir</option>
            <option value="Berkane">Berkane</option>
            <option value="Youssoufia">Youssoufia</option>
            <option value="Taourirt">Taourirt</option>
            <option value="Sidi Kacem">Sidi Kacem</option>
            <option value="Benslimane">Benslimane</option>
            <option value="Asilah">Asilah</option>
            <option value="Msida">Msida</option>
        </select>
        <span>Prix</span><br>
        <input type="number" id="price" name="price">

        <label>Type:</label><br>
        <input type="radio" id="appartement" name="type" value="Appartement">
        <span>Appartement</span><br>
        <input type="radio" id="riad" name="type" value="Riad">
        <span>Riad</span><br>
        <input type="radio" id="villa" name="type" value="Villa">
        <span>Villa</span><br>
        <input type="radio" id="maison" name="type" value="Maison">
        <span>Maison</span><br>
        <input type="radio" id="bureau" name="type" value="bureau">
        <span>Bureau</span><br>

        <label for="surface">Surface:</label>
        <select id="surface" name="surface">
            <option value="40">40 ㎥</option>
            <option value="60">60 ㎥</option>
            <option value="">80 ㎥</option>
            <option value="">120 ㎥</option>
            <option value="">140 ㎥</option>
            <option value="">160 ㎥</option>
            <option value="">180 ㎥</option>
            <option value="">200 ㎥</option>
            <option value="">300 ㎥</option>
            <option value="">400 ㎥</option>
            <!-- Add more options as needed -->
        </select>

        <label>Caractéristique:</label><br>
        <input type="checkbox" id="climatisation" name="climatisation">
        <span>Climatisation</span><br>
        <input type="checkbox" id="garage" name="garage">
        <span>Garage</span><br>
        <input type="checkbox" id="cuisine_equipé" name="cuisine_equipé">
        <span>Cuisine Equipé</span><br>
        <input type="checkbox" id="chauffage_central" name="chauffage_central">
        <span>Chauffage Central</span><br>
        <input type="checkbox" id="wifi" name="wifi">
        <span>Wifi</span><br>
        <input type="checkbox" id="tv" name="TV">
        <span>TV</span><br>

        <label for="description">Description</label><br>
        <textarea id="description" rows="5" name="description"></textarea><br>

        <label for="">Primary photo : </label>
        <input type="file" name="primary_image" id="">

        <label for="photos">Photos:</label>
        <input type="file" id="photos" name="images[]" multiple><br>

        <input type="submit" value="Publier">
    </form>

</body>

</html>
