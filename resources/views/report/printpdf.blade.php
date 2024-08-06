<!DOCTYPE html>
<html>
<head>
  <title>Report SLA</title>
  {{-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> --}}
  <style>
    #user {
      font-size: 10px;
      border-collapse: collapse;
      width: 100%;
    }

    #user td, #user th {
      border: 1px solid #ddd;
      padding: 6px;
    }

    #user tr:nth-child(even){background-color: #f2f2f2;}

    #user tr:hover {background-color: #ddd;}

    #user th {
      padding-top: 12px;
      padding-bottom: 12px;
      text-align: left;
      background-color: #068b06;
      color: white;
    }
    </style>
</head>
<body>


  <center>
    <h3>REPORT SLA </h4>
    <?php
    $timezone = "Asia/Jakarta";
    $date = new DateTime('now', new DateTimeZone($timezone));
    $timestamp = $date->format('d-m-Y H:i:s');
    ?>
    <h5>Date: {{ $timestamp }}</h6>
  </center>


      <table id="user">

        <tr>
            <th scope="col">No</th>
            <th scope="col">Name Link</th>
            <th scope="col">Problem</th>
            <th scope="col">Ticket ID</th>
            <th scope="col">ISP</th>
            <th scope="col">Start Problem</th>
            <th scope="col">End Problem</th>
            <th scope="col">Avaibility</th>
            <th scope="col">Total 100%</th>
            <th scope="col">Hours</th>
            <th scope="col">%</th>
            <th scope="col">Total Hours</th>
        </tr>

          <tbody>
            <?php $no=1
            
            ?>
            @foreach ($hitung as $data)

            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->site }}</td>
                <td>{{ $data->tiket }}</td>
                <td>{{ $data->problem }}</td>
                <td>{{ $data->isp }}</td>
                <td>{{ $data->mulai }}</td>
                <td>{{ $data->akhir }}</td>
                <td>{{ $data->avaibility }}</td>
                <td>{{ $data->hasil_persen }}%</td>
                <td>{{ $data->maint }}</td>
                <td>{{ $data->persen }}</td>
                <td>{{ $data->total_jam }}</td>
            </tr>
            @endforeach

            <?php $hasil_hours = 0; ?>
            
            @foreach ($hitung as $total )
            <?php
                $hasil_hours += $total->maint;                
            ?>
            @endforeach
            <?php 
                $waktu = $data->total_jam;
                $totalnya = $waktu*$sum;

                //$persen = round($hasil_hours/$waktu * 100, 2);
                $av = $waktu-$hasil_hours;
                $hasil_persen = round($av/$totalnya * 100, 2);
                $persen = 100-$hasil_persen;
            ?>

            <tr>
                <td colspan="7">Total SLA</td>
                <td>{{ $av }}</td>
                <td>{{ $persen }}%</td>
                <td>{{ $hasil_hours }}</td>
                <td>{{ $hasil_persen }}</td>
                <td>{{ $totalnya }}</td>
            </tr>
          </tbody>
      </table>


</body>
</html>
