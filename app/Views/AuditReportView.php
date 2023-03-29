<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />

  <title>Audit Report</title>
  <style type="text/css">
    @page {
      size: A4;
      margin: 1.5cm;
    }

    body {
      background-color: #e8e8e8;
      font-family: Arial, sans-serif;
      font-size: 12pt;
      line-height: 1.5;
    }

    h1,
    h2,
    h3 {
      text-align: center;
      margin: 0;
    }

    table {
      border-collapse: collapse;
      width: 100%;
      margin-bottom: 20px;
      border: 2px solid #ffffff;
    }

    th:first-child,
    th:last-child {
      border-top: 2px solid #4CAF50;
      border-bottom: 2px solid #4CAF50;
    }

    th {
      background-color: #4CAF50;
      color: white;
      font-size: 16px;
    }

    th:nth-child(2),
    td:nth-child(2) {
      width: 30%;
    }

    th:nth-child(3),
    td:nth-child(3) {
      width: 25%;
    }

    td,
    th {
      text-align: left;
      padding: 12px 16px;
      border: 1px solid #ddd;
      text-align: center;
    }

    tr:nth-child(even) {
      background-color: #f2f2f2;
    }

    tr:hover {
      background-color: #CCFFCC;
    }

    th:first-child,
    th:nth-child(2),
    th:last-child {
      border: 2px solid #ffffff;
    }


    @media (max-width: 600px) {

      td,
      th {
        padding: 8px;
      }
    }

    .container {
      width: 800px;
      margin: 0 auto;
    }
  </style>
</head>

<body>

  <div class="container">

    <h1 style="font-size: 32px; color: #333;">
      <?= $company_info['companyName'] ?> <span style="color: #4CAF50;"> Accessibility Report <i class="far fa-file-alt"></i></span></h1>

    <br>
    <table>
      <thead>
        <tr>
          <th>Audit Question</th>
          <th>Question Category</th>
          <th>Company Response</th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($question_data as $k => $v) {
          foreach ($question_data[$k] as $q_item) { ?>
            <tr>
              <td><?php echo $q_item['question']; ?></td>
              <td>
                <?php
                $icons = array(
                  "Wheelchair" => "fas fa-wheelchair",
                  "visual impairment" => "fas fa-low-vision",
                  "Hearing impairment" => "fas fa-deaf",
                  "Sensory issues" => "fas fa-hand-sparkles",
                  "Learning difficulties" => "fas fa-question",
                  "general" => "fas fa-user",
                  "website" => "fas fa-laptop",
                  "general2" => "fas fa-user",
                  "wc" => "fas fa-toilet"

                );
                if (isset($icons[$q_item['category']])) {
                  echo '<i class="' . $icons[$q_item['category']] . '"></i>';
                }
                ?>
                <?php echo $q_item['category']; ?>
              </td>
              <td style="color:<?php echo ($q_item['response'] == '1') ? 'green' : 'red'; ?>; font-weight:bold;">
                <?php if ($q_item['response'] == '1') : ?>
                  <i class="fas fa-check"></i> Yes
                <?php else : ?>
                  <i class="fas fa-times"></i> No
                <?php endif; ?>
              </td>

            </tr>
        <?php }
        } ?>
      </tbody>
    </table>

</body>

</html>