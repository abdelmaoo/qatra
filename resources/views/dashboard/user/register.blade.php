@extends('layouts.app')

@section('headers')

    <title>User Register</title>
@endsection



@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-4 offset-md-4 mt-5 mb-3">
                <h4>Entrer vos informations</h4>
                <hr>
                <form method="POST" action="{{ route('user.create') }}" autocomplete="off">
                    @if (Session::get('success'))
                        <div class="alert alert-success">
                            {{ Session::get('success') }}
                        </div>
                    @endif
                    @if (Session::get('fail'))
                        <div class="alert alert-danger">
                            {{ Session::get('fail') }}
                        </div>
                    @endif

                    @csrf
                    <div class="form-group">
                        <label for="name">Nom</label>
                        <input type="text" class="form-control " name="name" placeholder="Entrez votre nom"
                            value="{{ old('name') }}">
                        <span class="text-danger">@error('name'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control " name="prenom" placeholder="Entrez votre prénom"
                            value="{{ old('prenom') }}">
                        <span class="text-danger">@error('prenom'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="region">Region</label>
                        <select id+="region" class="form-select input " name="region" required>
                            <option value="">region</option>
                            <option value="1">1 - Adrar </option>
                            <option value="2">2 - Chlef </option>
                            <option value="3">3 - Laghouat </option>
                            <option value="4">4 - Oum bouaghi </option>
                            <option value="5">5 - Batna </option>
                            <option value="6">6 - Bejaia </option>
                            <option value="7">7 - Biskra </option>
                            <option value="8">8 - Bechar </option>
                            <option value="9">9 - Blida </option>
                            <option value="10">10 - Bouira </option>
                            <option value="11">11 - Tamanrasset </option>
                            <option value="12">12 - Tebessa </option>
                            <option value="13">13 - Tlemcen </option>
                            <option value="14">14 - Tiaret </option>
                            <option value="15">15 - Tizi ouzou</option>
                            <option value="16">16 - Alger </option>
                            <option value="17">17 - Djelfa </option>
                            <option value="18">18 - Jijel </option>
                            <option value="19">19 - Setif </option>
                            <option value="20">20 - Saida </option>
                            <option value="21">21 - Skikda </option>
                            <option value="22">22 - Sidi Bel Abbes</option>
                            <option value="23">23 - Annaba </option>
                            <option value="24">24 - Guelma </option>
                            <option value="25">25 - Constantine </option>
                            <option value="26">26 - Medea </option>
                            <option value="27">27 - Mostaganem </option>
                            <option value="28">28 - M'sila </option>
                            <option value="29">29 - Mascara </option>
                            <option value="30">30 - Ouargla </option>
                            <option value="31">31 - Oran </option>
                            <option value="32">32 - El Baydh </option>
                            <option value="33">33 - Illizi </option>
                            <option value="34">34 - Bordj Bou Arreridj</option>
                            <option value="35">35 - Boumerdes </option>
                            <option value="36">36 - El Taref </option>
                            <option value="37">37 - Tindouf </option>
                            <option value="38">38 - Tissemsilt </option>
                            <option value="39">39 - El Oued </option>
                            <option value="40">40 - Khenchla </option>
                            <option value="41">41 - Souk Ahrass</option>
                            <option value="42">42 - Tipaza </option>
                            <option value="43">43 - Mila </option>
                            <option value="44">44 - Aïn Defla</option>
                            <option value="45">45 - Nâama </option>
                            <option value="46">46 - Aïn Temouchent</option>
                            <option value="47">47 - Ghardaïa </option>
                            <option value="48">48 - Relizane </option>
                            <option value="49">49 - Timimoun </option>
                            <option value="50">50 - Bordj Badji Mokhtar</option>
                            <option value="51">51 - Ouled Djellal</option>
                            <option value="52">52 - Béni Abbès</option>
                            <option value="53">53 - In Salah </option>
                            <option value="54">54 - In Guezzam </option>
                            <option value="55">55 - Touggourt </option>
                            <option value="56">56 - Djanet </option>
                            <option value="57">57 - El MGhair </option>
                            <option value="58">58 - El Meniaa </option>
                        </select>
                        <span class="text-danger">@error('region'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="username">Nom d'utilisateur</label>
                        <input type="text" class="form-control " name="username"
                            placeholder="Entrez votre nom d'utilisateur" value="{{ old('username') }}">
                        <span class="text-danger">@error('username'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="numero_de_telephone">Numero de téléphone</label>
                        <input type="text" class="form-control " name="numero_de_telephone"
                            placeholder="Entrez votre numero de téléphone" value="{{ old('numero_de_telephone') }}">
                        <span class="text-danger">@error('numero_de_telephone'){{ $message }} @enderror</span>
                    </div>

                    <div class="form-group">
                        <label for="groupe_sanguin">Genre</label>
                        <select id="sexe" class="form-select" class="input" name="sexe" required>
                            <option value="">Genre</option>
                            <option value="Femme">Femme</option>
                            <option value="Homme">Homme</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="groupe_sanguin">Groupe sanguin</label>
                        <select id="genre" class="form-select input " name="groupe_sanguin" required>
                            <option value="">Groupe sanguin</option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                        </select>
                        <span class="text-danger">@error('groupe_sanguin'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" placeholder="Entrez votre email"
                            value="{{ old('email') }}">
                        <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password">Mot de passe</label>
                        <input type="password" class="form-control " name="password" placeholder="Entrez un mot de passe"
                            value="{{ old('password') }}">
                        <span class="text-danger">@error('password'){{ $message }} @enderror</span>
                    </div>
                    <div class="form-group">
                        <label for="password-confirm">Confirmer la mot de passe</label>
                        <input type="password" class="form-control" name="password-confirm"
                            placeholder="Comfirmez le mot de passe" value="{{ old('password-confirm') }}">
                        <span class="text-danger">@error('password-confirm'){{ $message }} @enderror</span>
                    </div>

                    <br>
                    <div class="form-group">
                        <button type="submit" class="btn btn-secondary">S'inscrire</button>
                    </div>
                    <br>
                    <a href="{{ route('user.login') }} " class="link-secondary">J'ai déja un compte</a>
                </form>
            </div>
        </div>
    </div>
@endsection
