<?php


class CovidService
{
    private string $baseurl = 'https://covid-api.mmediagroup.fr/v1';
    private $client;

    public function __construct()
    {
        $this->client = curl_init();
        curl_setopt($this->client, CURLOPT_USERAGENT,'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/90.0.4430.93 Safari/537.36');
        curl_setopt($this->client, CURLOPT_RETURNTRANSFER, true);
    }

    public function getCases($country = ""): array
    {
        $uri = $this->baseurl . '/cases';
        curl_setopt($this->client, CURLOPT_URL, $uri);
        if(strlen($country) != 0){
            $result = json_decode(curl_exec($this->client), true)[$country]['All'];
        }else{
            $result = json_decode(curl_exec($this->client), true)['Global']['All'];
        }
        $confirmed = $result['confirmed'];
        $recovered = $result['recovered'];
        $deaths = $result['deaths'];
        return [
            'confirmados' => $confirmed,
            'recuperados' => $recovered,
            'mortos' => $deaths
        ];
    }
}