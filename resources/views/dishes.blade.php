
    <!DOCTYPE html>
    <html>
    <head>

    </head>
    <body>
    <header>
        <nav>
            <h1>Manger pour les nuls</h1>
            <ul>
                <li><a href="#">Recette</a></li>
            </ul>
            <button class="profil">Profile</button>
        </nav>
    </header>
    <main>
        <ul>
            @foreach($dishes as $dishes)
                <li>{{ $dishes->titre}}</li>
                <li>{{ $dishes->recette }}</li>
                <li>{{ $dishes->image_url}}</li>
            @endforeach
        </ul>
        <!--<caption>
            Recettes
        </caption>
        <thead>
        <tr>
            <th scope="col"></th>
            <th scope="col">Titre</th>
            <th scope="col">Créateur</th>
            <th scope="col">Likes</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td></td>
        </tr>
        <tr>
            <th scope="row">Dennis</th>
            <td>Web accessibility</td>
            <td>45</td>
        </tr>
        <tr>
            <th scope="row">Sarah</th>
            <td>JavaScript frameworks</td>
            <td>29</td>
        </tr>
        <tr>
            <th scope="row">Karen</th>
            <td>Web performance</td>
            -->
    </main>
    </body>
    </html>



