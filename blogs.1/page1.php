<?php
$api                =   'https://api.digitalocean.com/v2/droplets';
$token              =   'b6451f1c6866855b29811f3d05d7c8f86813c368d9a9f16276988212f528ee0d';

$options            =   [
    'http'          =>  [
        'method'    =>  'GET',
        'header'    =>  "Authorization: Bearer $token"
    ]
];

$context            =   stream_context_create( $options );

$results            =   file_get_contents( $api, false, $context );
$results            =   json_decode( $results );
print_r($results);
?>

<table class="table">
    <thead>
        <tr>
            <th style="text-align:center">Droplet ID</th>
            <th style="text-align:center">Server Name</th>
            <th style="text-align:center">Status</th>
            <th style="text-align:center">Public IPv4</th>
            <th style="text-align:center">Private IPv4</th>
            <th style="text-align:center">Public IPv6</th>
        </tr>
    </thead>
<?php
foreach ( $results as $droplets )
{
    foreach ( $droplets as $droplet )
    {
        if ( isset( $droplet->id ) )
        {
?>
        <tr>
            <td style="text-align:center"><?php echo $droplet->id; ?></td>
            <td style="text-align:center"><?php echo $droplet->name; ?></td>
            <td style="text-align:center"><?php echo $droplet->status; ?></td>
            <td style="text-align:center"><?php echo $droplet->networks->v4[1]->ip_address; ?></td>
            <td style="text-align:center"><?php echo isset( $droplet->networks->v4[0]->ip_address ) ? $droplet->networks->v4[0]->ip_address : 'No Private IP'; ?></td>
            <td style="text-align:center"><?php echo $droplet->networks->v6[0]->ip_address; ?></td>
        </tr>
<?php
        }
    }
}
?>
    </thead>
</table>