<?php
require __DIR__ . '../../../../vendor/autoload.php';

class sheetAPi
{

    private $sheets;


    public function __construct(
        string $applicationName = 'Google Sheets API',
        string $path = 'credentials.json',
        array $scopes = ['https://www.googleapis.com/auth/spreadsheets']
    ) {

        // Google client configuration
        $client = new Google_Client();
        $client->setApplicationName($applicationName); //set application name
        $client->setScopes($scopes); //set configured scopes
        $client->setAccessType('offline'); // set access type
        $client->setAuthConfig($path); // set the path to the credentials.json file

        $this->sheets = new Google\Service\Sheets($client);
    }


    
    // Get all rows in the sheets function
    public function getAllRows(string $range, string $spreadsheetId = '12sBkbRsEPbO9iaW9xUisc1v5x6C12jPURYDFpIf-M9A')
    {

        $respond = $this->sheets->spreadsheets_values->get($spreadsheetId, $range);
        $values = $respond->getValues();

        return $values;
    }

    // Insert a new row into the sheets
    public function InsertRow(array $values, string $range, string $spreadsheetId = '12sBkbRsEPbO9iaW9xUisc1v5x6C12jPURYDFpIf-M9A')
    {



        $body = new Google\Service\Sheets\ValueRange(
            [
                'majorDimension' => 'ROWS',
                'values' => $values,
            ]
        );
        $params = [
            'valueInputOption' => 'RAW'
        ];
        $insert = [
            'insertDataOption' => 'INSERT_ROWS'
        ];

        $result = $this->sheets->spreadsheets_values->append(
            $spreadsheetId,
            $range,
            $body,
            $params,
            $insert
        );
    }
}
