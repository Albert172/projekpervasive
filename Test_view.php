<font color="orange">

</font>

<style>
/* Add a black background color to the top navigation */
.topnav {
  background-color: #111;
  overflow: hidden;
  position: sticky;
  top: 0;
  z-index: 9999;
}

/* Style the links inside the navigation bar */
.topnav a {
  float: right;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

/* Change the color of links on hover */
.topnav a:hover {
  background-color: #ddd;
  color: black;
}

/* Add a color to the active/current link */
.topnav a.active {
  background-color: #4CAF50;
  color: white;
}
</style>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<div class="topnav">
	<a class="active" href="logout.php" onclick="return confirm('Are you sure to logout?');">Logout</a>

	<button class="openbtn" onclick="openNav()">☰ Menu</button>  
	</div>
<div class="col-md-6 offset-md-3">
<div class="card">
<div class="card-body">
<table class="table table-hover">
<caption>Data History</caption>
<thead class="thead-dark">
    <tr>
	<th>ID</th>
	<th>TEMP(C)</th>
	<th>SOIL MOIST(%)</th>
	<th>WATER(%)</th>
	<th>SPRAY</th>
	<th>DATE & TIME</th>
	</tr>
</thead>
	<tbody>	
    <?php

    foreach ($data_nilai as $nilai){ ?>
	<tr>
			<td><?php echo $nilai['id']; ?></td>
            <td><?php echo $nilai['tmp']; ?></td>
			<td><?php echo $nilai['soil']; ?></td>
			<td><?php echo $nilai['water']; ?></td>
			<td><?php echo $nilai['spray']; ?></td>
			<td><?php echo $nilai['date']; ?></td>
    </tr>
    <?php } ?>
	</tbody>
</table>
</br>
<table class="table table-hover">
<caption>Data History</caption>
<thead class="thead-dark">
    <tr>
	<th>ID</th>
	<th>TEMP(C)</th>
	<th>SOIL MOIST(%)</th>
	<th>WATER(%)</th>
	<th>SPRAY</th>
	<th>DATE & TIME</th>
	</tr>
</thead>
	<tbody>	
    <?php

    foreach ($data_nilai as $nilai){ ?>
	<tr>
			<td><?php echo $nilai['id']; ?></td>
            <td><?php echo $nilai['tmp']; ?></td>
			<td><?php echo $nilai['soil']; ?></td>
			<td><?php echo $nilai['water']; ?></td>
			<td><?php echo $nilai['spray']; ?></td>
			<td><?php echo $nilai['date']; ?></td>
    </tr>
    <?php } ?>
	</tbody>
</table>
</div>
</div>
</div>

<div class="col-md-6 offset-md-3">
		<div class="card">
			<div class="card-body">
	<canvas id="myChart"></canvas>
	<script src="https://cdn.jsdelivr.net/npm/chart.js@2.8.0"></script>
	<script>
	var labelTemp = [], labelSoil = [], labelWater = [], labelSpray = [], labelId = []

async function dummyChart() {
  await getDummyData()

const ctx = document.getElementById('myChart').getContext('2d');

const chart = new Chart(ctx, {
    // The type of chart we want to create
    type: 'line',

    // The data for our dataset
    data: {
        labels: labelId,
        datasets: [{
            label: 'Temperature',
            //backgroundColor: 'red',
            borderColor: 'red',
            data: labelTemp
        },
        {
          label: 'Soil Moisture',
          //backgroundColor: 'yellow',
          borderColor: 'yellow',
          data: labelSoil
      },
	  {
          label: 'Water Reserve',
          //backgroundColor: 'blue',
          borderColor: 'blue',
          data: labelWater
      },
	  {
          label: 'Spray',
          //backgroundColor: 'green',
          borderColor: 'black',
          data: labelSpray
      }
      ]
    },

    // Configuration options go here
    options: {
      tooltips: {
        mode: 'index'
      }
    }
})}

dummyChart()

//Fetch Data from API

async function getDummyData() {
  const apiUrl = 'http://localhost/rest_api/api/nilai?X-API-KEY=test'

  const response = await fetch(apiUrl)
  const barChatData = await response.json()
  
  const id = barChatData.data.map((x) => x.id)
  const temp = barChatData.data.map((x) => x.tmp)
  const soil = barChatData.data.map((x) => x.soil)
  const water = barChatData.data.map((x) => x.water)
  const spray = barChatData.data.map((x) => x.spray)

 labelId = id
 labelTemp = temp
 labelSoil = soil
 labelWater = water
 labelSpray = spray

}
	</script>
			</div>
		</div>
	</div>
 <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>