<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>First Team</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background: url('imagines/marinel.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .header {
            padding: 30px;
            background: rgba(195, 191, 191, 0.849);
            text-align: center;
            font-size: 36px;
            font-weight: bold;
            color: #333;
        }

        .nav {
            display: flex;
            justify-content: center;
            border-bottom: 1px solid #ddd;
            padding: 15px 20px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .nav a {
            text-decoration: none;
            color: #555;
            font-size: 18px;
            padding: 10px 15px;
            border-radius: 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .nav a:hover {
            background-color: #e9ecef;
            color: #333;
        }

        .nav a.active {
            color: #5a2ff4;
            font-weight: bold;
            background-color: #f0f0fa;
        }

        .nav .menu ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 20px;
        }

        .nav .menu li {
            margin: 0;
        }

        .filters {
            margin-top: 20px;
            padding: 10px;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            border-bottom: 2px solid #444;
        }

        .filters label {
            color: white;
            font-weight: bold;
            margin-right: 10px;
            font-size: 18px;
        }

        .filters select {
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            border: none;
        }

        .container {
            padding: 20px;
            margin-top: 20px;
        }

        .section-title {
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 25px;
            color: #333;
            border-bottom: 2px solid #eee;
            padding-bottom: 10px;
        }

        .players {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .flip-card {
            background-color: transparent;
            width: 200px;
            height: 300px;
            perspective: 1000px;
        }

        .flip-card-inner {
            position: relative;
            width: 100%;
            height: 100%;
            text-align: center;
            transition: transform 0.8s;
            transform-style: preserve-3d;
        }

        .flip-card:hover .flip-card-inner {
            transform: rotateY(180deg);
        }

        .flip-card-front, .flip-card-back {
            position: absolute;
            width: 100%;
            height: 100%;
            -webkit-backface-visibility: hidden;
            backface-visibility: hidden;
            border-radius: 10px;
            box-shadow: 0px 6px 12px rgba(0, 0, 0, 0.15);
        }

        .flip-card-front {
            background: linear-gradient(to bottom, #e0d8ff, #ffffff);
            color: black;
            padding: 10px;
        }

        .flip-card-back {
            background-color: #f0f0fa;
            color: black;
            transform: rotateY(180deg);
            padding: 20px;
        }

        .flip-card img {
            width: 100%;
            height: 180px;
            border-radius: 8px;
            object-fit: cover;
        }

        .player-info {
            margin-top: 10px;
            font-size: 16px;
            font-weight: bold;
            color: #444;
        }

        .player-number {
            font-size: 20px;
            font-weight: bold;
            color: #5a2ff4;
        }

        .player-position {
            color: #777;
            font-size: 14px;
        }
    </style>
</head>
<body>
<div class="header">First Team</div>
<nav class="nav">
    <div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="scores.php">Scores</a></li>
            <li><a href="teams.php">Teams</a></li>
            <li><a href="contact.php">Contact</a></li>
            <?php if (isset($_SESSION['username'])): ?>
                <li><a href="logout.php">Ieșire</a></li>
            <?php else: ?>
                <li><a href="login.php">Conectare</a></li>
                <li><a href="register_page.php">Înregistrare</a></li>
            <?php endif; ?>
        </ul>
    </div>
    <a href="#" class="active">Squad</a>
</nav>

<div class="filters">
    <label for="positionFilter">Filter by position:</label>
    <select id="positionFilter">
        <option value="all">All</option>
        <option value="Goalkeeper">Goalkeeper</option>
        <option value="Forward">Forward</option>
        <option value="Midfielder">Midfielder</option>
    </select>
</div>

<!-- GOALKEEPERS -->
<div class="container">
    <div class="section-title">Goalkeeper</div>
    <div class="players">
        <!-- COURTOIS -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/courtuis.jpg" alt="Courtois">
                    <div class="player-info">
                        <span class="player-number">1</span> Courtois
                        <div class="player-position">Goalkeeper</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Belgia ]</p>
                    <p><strong>Meciuri:</strong> [ 195 ]</p>
                    <p><strong>Varsta:</strong> [ 32 ]</p>
                </div>
            </div>
        </div>
        <!-- LUNIN -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/lunin.jpg" alt="Lunin">
                    <div class="player-info">
                        <span class="player-number">13</span> Lunin
                        <div class="player-position">Goalkeeper</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Ucraina ]</p>
                    <p><strong>Meciuri:</strong> [ 55 ]</p>
                    <p><strong>Varsta:</strong> [ 26 ]</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- FORWARDS -->
<div class="container">
    <div class="section-title">Forward</div>
    <div class="players">
        <!-- RODRYGO -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/rodrygo.jpg" alt="Rodrygo">
                    <div class="player-info">
                        <span class="player-number">11</span> Rodrygo
                        <div class="player-position">Forward</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Brazilia ]</p>
                    <p><strong>Meciuri:</strong> [ 170 ]</p>
                    <p><strong>Varsta:</strong> [ 24 ]</p>
                </div>
            </div>
        </div>
        <!-- VINICIUS -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/vinijr.jpg" alt="Vini Jr">
                    <div class="player-info">
                        <span class="player-number">7</span> Vini Jr
                        <div class="player-position">Forward</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Brazilia ]</p>
                    <p><strong>Meciuri:</strong> [ 200 ]</p>
                    <p><strong>Varsta:</strong> [ 24 ]</p>
                </div>
            </div>
        </div>
        <!-- ENDRICK -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/endrick.jpg" alt="Endrick">
                    <div class="player-info">
                        <span class="player-number">16</span> Endrick
                        <div class="player-position">Forward</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Brazilia ]</p>
                    <p><strong>Meciuri:</strong> [ 17 ]</p>
                    <p><strong>Varsta:</strong> [ 18 ]</p>
                </div>
            </div>
        </div>
        <!-- MBAPPE -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/mbappe.jpg" alt="Mbappe">
                    <div class="player-info">
                        <span class="player-number">9</span> Mbappe
                        <div class="player-position">Forward</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Franta ]</p>
                    <p><strong>Meciuri:</strong> [ 33 ]</p>
                    <p><strong>Varsta:</strong> [ 26 ]</p>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- MIDFIELDERS -->
<div class="container">
    <div class="section-title">Midfielder</div>
    <div class="players">
        <!-- MODRIC -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/modric.jpg" alt="Modric">
                    <div class="player-info">
                        <span class="player-number">10</span> Modric
                        <div class="player-position">Midfielder</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Croatia ]</p>
                    <p><strong>Meciuri:</strong> [ 388 ]</p>
                    <p><strong>Varsta:</strong> [ 39 ]</p>
                </div>
            </div>
        </div>
        <!-- VALVERDE -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/valverde.jpg" alt="Valverde">
                    <div class="player-info">
                        <span class="player-number">8</span> Valverde
                        <div class="player-position">Midfielder</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Uruguai ]</p>
                    <p><strong>Meciuri:</strong> [ 205 ]</p>
                    <p><strong>Varsta:</strong> [ 26 ]</p>
                </div>
            </div>
        </div>
        <!-- CAMAVINGA -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/camavinga.jpg" alt="Camavinga">
                    <div class="player-info">
                        <span class="player-number">6</span> Camavinga
                        <div class="player-position">Midfielder</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Franta ]</p>
                    <p><strong>Meciuri:</strong> [ 136 ]</p>
                    <p><strong>Varsta:</strong> [ 22 ]</p>
                </div>
            </div>
        </div>
        <!-- DIAZ -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/diaz.jpg" alt="Diaz">
                    <div class="player-info">
                        <span class="player-number">21</span> Diaz
                        <div class="player-position">Midfielder</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Maroc ]</p>
                    <p><strong>Meciuri:</strong> [ 70 ]</p>
                    <p><strong>Varsta:</strong> [ 25 ]</p>
                </div>
            </div>
        </div>
        <!-- BELLINGHAM -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/beligol.jpg" alt="Bellingham">
                    <div class="player-info">
                        <span class="player-number">5</span> Bellingham
                        <div class="player-position">Midfielder</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Anglia ]</p>
                    <p><strong>Meciuri:</strong> [ 52 ]</p>
                    <p><strong>Varsta:</strong> [ 21 ]</p>
                </div>
            </div>
        </div>
        <!-- CEBALLOS -->
        <div class="flip-card">
            <div class="flip-card-inner">
                <div class="flip-card-front">
                    <img src="imagines/ceballos.jpg" alt="Ceballos">
                    <div class="player-info">
                        <span class="player-number">22</span> Ceballos
                        <div class="player-position">Midfielder</div>
                    </div>
                </div>
                <div class="flip-card-back">
                    <p><strong>Nationalitate:</strong> [ Spania ]</p>
                    <p><strong>Meciuri:</strong> [ 110 ]</p>
                    <p><strong>Varsta:</strong> [ 28 ]</p>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    document.getElementById('positionFilter').addEventListener('change', function () {
        const selectedPosition = this.value;
        const cards = document.querySelectorAll('.flip-card');

        cards.forEach(card => {
            const position = card.querySelector('.player-position').textContent.trim();
            if (selectedPosition === 'all' || position === selectedPosition) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>
<script src="main.js"></script>
</body>
</html>
