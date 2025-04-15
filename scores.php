<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Football Matches Days</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: Arial, sans-serif;
            background: url('images/marinel.jpg') no-repeat center center fixed;
            background-size: cover;
        }

        .menu {
            background: rgba(0, 0, 0, 0.8);
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 1000;
            padding: 10px 0;
            text-align: center;
        }

        .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
        }

        .menu ul li {
            margin: 0 15px;
        }

        .menu ul li a {
            text-decoration: none;
            color: white;
            font-size: 18px;
            font-weight: bold;
            padding: 10px 15px;
            transition: 0.3s;
        }

        .menu ul li a:hover {
            background: rgba(255, 255, 0, 0.8);
            color: black;
            border-radius: 5px;
        }

        @media (max-width: 768px) {
            .menu ul {
                flex-direction: column;
            }

            .menu ul li {
                margin: 5px 0;
            }
        }

        .filters {
            margin-top: 60px;
            padding: 15px 0;
            text-align: center;
            background-color: rgba(0, 0, 0, 0.8);
            border-bottom: 2px solid black;
        }

        .filters input,
        .filters select {
            padding: 8px;
            font-size: 16px;
            border-radius: 5px;
            margin: 10px;
            border: 1px solid #000;
        }

        .filters label {
            color: white;
            font-weight: bold;
            font-size: 18px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: rgba(127, 126, 126, 0.836);
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #e4bfbf;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #8abaeb;
            color: rgba(0, 21, 253, 0.878);
        }

        tr:nth-child(even) {
            background-color: #ff020299;
        }
    </style>
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="news.php">News</a></li>
            <li><a href="scores.html">Scores</a></li>
            <li><a href="teams.php">Teams</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </div>

    <!-- 🔍 Filtre sus sub meniu -->
    <div class="filters">
        <label for="teamSearch">Caută echipă:</label>
        <input type="text" id="teamSearch" placeholder="ex: Real Madrid">

        <label for="monthFilter">Filtrează după lună:</label>
        <select id="monthFilter">
            <option value="all">Toate lunile</option>
            <option value="01">Ianuarie</option>
            <option value="02">Februarie</option>
            <option value="03">Martie</option>
            <option value="04">Aprilie</option>
            <option value="05">Mai</option>
        </select>
    </div>

    <!-- 📅 Tabel meciuri -->
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Time</th>
                <th>Match</th>
                <th>Competition</th>
                <th>Broadcaster</th>
            </tr>
        </thead>
        <tbody>
            <tr><td>WED 26.02.2025</td><td>22:30</td><td>Real Sociedad vs Real Madrid</td><td>Copa del Rey</td><td>0-1</td></tr>
            <tr><td>SAT 01.03.2025</td><td>19:30</td><td>Real Betis vs Real Madrid</td><td>LaLiga EA Sports</td><td>2-1</td></tr>
            <tr><td>TUE 04.03.2025</td><td>22:00</td><td>Real Madrid vs Atlético de Madrid</td><td>UEFA Champions League</td><td>2-1</td></tr>
            <tr><td>SUN 09.03.2025</td><td>17:15</td><td>Real Madrid vs Rayo Vallecano</td><td>LaLiga EA Sports</td><td>2-1</td></tr>
            <tr><td>WED 12.03.2025</td><td>22:00</td><td>Atlético de Madrid vs Real Madrid</td><td>UEFA Champions League</td><td>1-0</td></tr>
            <tr><td>SUN 16.03.2025</td><td>19:30</td><td>Villarreal CF vs Real Madrid</td><td>LaLiga EA Sports</td><td>1-2</td></tr>
            <tr><td>WED 29.03.2025</td><td>22:00</td><td>Real Madrid vs Leganes</td><td>LaLiga EA Sports</td><td>-</td></tr>
            <tr><td>SAT 01.04.2025</td><td>22:30</td><td>Real Madrid vs Real Sociedad</td><td>Copa del Rey</td><td>-</td></tr>
            <tr><td>TUE 06.04.2025</td><td>22:00</td><td>Real Madrid vs Valencia</td><td>LaLiga EA Sports</td><td>-</td></tr>
            <tr><td>SUN 09.03.2025</td><td>22:30</td><td>Alaves vs Real Madrid</td><td>LaLiga EA Sports</td><td>-</td></tr>
            <tr><td>WED 20.04.2025</td><td>22:00</td><td>Real Madrid vs Athletic Club</td><td>UEFA Champions League</td><td>-</td></tr>
            <tr><td>SUN 23.04.2025</td><td>22:00</td><td>Getafe vs Real Madrid</td><td>LaLiga EA Sports</td><td>-</td></tr>
        </tbody>
    </table>

    <footer>
        <p style="text-align:center; color:white; margin: 30px 0;">&copy; 2025 Football Madrid. All rights reserved.</p>
    </footer>

    <!-- 🧠 Script filtrare -->
    <script>
        const teamSearchInput = document.getElementById("teamSearch");
        const monthFilter = document.getElementById("monthFilter");
        const rows = document.querySelectorAll("table tbody tr");

        function filterTable() {
            const teamQuery = teamSearchInput.value.toLowerCase();
            const selectedMonth = monthFilter.value;

            rows.forEach(row => {
                const match = row.children[2].textContent.toLowerCase();
                const dateText = row.children[0].textContent.trim();
                const dateParts = dateText.split(".");
                const monthInDate = dateParts[1];

                const matchFound = match.includes(teamQuery);
                const monthMatch = selectedMonth === "all" || monthInDate === selectedMonth;

                row.style.display = (matchFound && monthMatch) ? "" : "none";
            });
        }

        teamSearchInput.addEventListener("input", filterTable);
        monthFilter.addEventListener("change", filterTable);
    </script>
    <script src="main.js"></script>
</body>
</html>
