<?php

namespace App;

class MakeArray
{
  private $info = [
    ["Ticket ID", "Description", "Status", "Priority", "Agent ID", "Agent Name", "Agent Email", "Contact ID", "Contact Name", "Contact Email", "Group ID", "Group Name", "Company ID", "Company Name", "Comments"]
  ];
  public function ticketsArray($tickets, $ticketsObj)
  {
    foreach ($tickets as $ticket) {
      $ticket_item = [];
      $agent_name = $ticketsObj->getAgent($ticket['responder_id'])['contact']['name'];
      $agent_email = $ticketsObj->getAgent($ticket['responder_id'])['contact']['email'];
      $group_name = $ticketsObj->getGroup($ticket['group_id'])['name'];
      $company_name = $ticketsObj->getCompany($ticket['company_id'])['name'];
      $comments = $ticketsObj->getComments($ticket['id']);
      array_push(
        $ticket_item,
        $ticket['id'],
        strip_tags($ticket['description']),
        $ticket['status'],
        $ticket['priority'],
        $ticket['responder_id'],
        $agent_name,
        $agent_email,
        $ticket['requester']['id'],
        $ticket['requester']['name'],
        $ticket['requester']['email'],
        $ticket['group_id'],
        $group_name,
        $ticket['company_id'],
        $company_name,
        $comments
      );
      array_push($this->info, $ticket_item);
    }
    return $this->info;
  }
}
