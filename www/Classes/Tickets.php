<?php

namespace App;

use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Client;

class Tickets
{
  public $domain;
  public $api_kay;

  public function __construct($domain, $api_kay, $password)
  {
    $this->domain = $domain;
    $this->api_kay = base64_encode($api_kay . ':' . $password);
  }

  public function getTickets()
  {
    $headers = ['Content-Type' => 'application/json', 'Authorization' => $this->api_kay];
    $client = new Client();
    $request = new Request('GET', 'https://' . $this->domain . '.freshdesk.com/api/v2/tickets?include=description,requester', $headers);
    $response = json_decode($client->send($request)->getBody()->getContents(), true);
    return $response;
  }
  public function getAgent($agent_id)
  {
    $headers = ['Content-Type' => 'application/json', 'Authorization' => $this->api_kay];
    $client = new Client();
    $uri = 'https://' . $this->domain . '.freshdesk.com/api/v2/agents/' . $agent_id;
    $request = new Request('GET', $uri, $headers);
    $response = json_decode($client->send($request)->getBody()->getContents(), true);
    return $response;
  }
  public function getGroup($group_id)
  {
    $headers = ['Content-Type' => 'application/json', 'Authorization' => $this->api_kay];
    $client = new Client();
    $uri = 'https://' . $this->domain . '.freshdesk.com/api/v2/groups/' . $group_id;
    $request = new Request('GET', $uri, $headers);
    $response = json_decode($client->send($request)->getBody()->getContents(), true);
    return $response;
  }
  public function getCompany($company_id)
  {
    $headers = ['Content-Type' => 'application/json', 'Authorization' => $this->api_kay];
    $client = new Client();
    $uri = 'https://' . $this->domain . '.freshdesk.com/api/v2/companies/' . $company_id;
    $request = new Request('GET', $uri, $headers);
    $response = json_decode($client->send($request)->getBody()->getContents(), true);
    return $response;
  }
  public function getComments($ticket_id)
  {
    $headers = ['Content-Type' => 'application/json', 'Authorization' => $this->api_kay];
    $client = new Client();
    $uri = 'https://' . $this->domain . '.freshdesk.com/api/v2/tickets/' . $ticket_id . '?include=conversations';
    $request = new Request('GET', $uri, $headers);
    $response = json_decode($client->send($request)->getBody()->getContents(), true);

    $arr = [];
    foreach ($response['conversations'] as $comment) {
      array_push($arr, strip_tags($comment['body']));
    }
    $comments = implode(' | ', $arr);

    return $comments;
  }
}
