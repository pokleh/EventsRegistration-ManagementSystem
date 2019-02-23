<?php
include('php/session.php');
 
$id = $_POST['id'];
$row = $connection->query("SELECT events.eventTitle,events.eventInfo,events.eventCategory,events.eventPrice,events.img,reservedcustomer.id,reservedcustomer.theme,reservedcustomer.request,reservedcustomer.startTime,reservedcustomer.startFor, reservedcustomer.endTime,reservedcustomer.endTimeFor, reservedcustomer.dateReserved,reservedcustomer.packs,reservedcustomer.paymentMethod,reservedcustomer.paymentStatus,reservedcustomer.status FROM reservedcustomer
INNER JOIN events ON reservedcustomer.eventID = events.eventID WHERE reservedcustomer.id = '$id'")->fetch_assoc();
 
?>
<a style="text-decoration:none;display:none;" id="view" data-toggle="modal" data-target="#myModal" class="btn btn-info btn-sm">View Contract</a>
                             
 <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
  
        </div>
        <div class="modal-body" id="printTable">
                    <h4 class="modal-title"> Terms and Agreement</h4><br>
          <p>


This Agreement for event planning services is hereby entered into by and between the following parties:<br> <br>
<b>Fab Events</b> <br>
<b>Events management & services </b><br> 
<b>Buli, Taal, Batangas</b><br><br>

<b>Contact Person:</b> Rose Ann Barquilla – Mendoza <br>
0935 – 633 – 7433
<br> <br>
<b>Mission:</b> To provide our clients memorable experience through creative events and planning. <br>
<b>Goals and Objectives:</b> Our Team will make sure that every event will be fabulously planned to give our client an extraordinary results. Fab Events will make sure that every event must start and end with a bang!
<br> <br>
<b>Client:</b> Ms. <?php echo ucwords($fullName); ?><br>
<b>Address:</b> <?php echo ucwords($address); ?><br>
<b>Contact Number:</b> <?php echo ucwords($contactNumber); ?><br>
<b>Contact Person:</b> Sir Edgar<br>
<br><br> 
<br>RECITALS</b><br>
1.  Place of event (venue): Not Confirmed<br> 
2.  Address of event: Batangas<br> 
3.  City: Buli Taal, Batangas   &nbsp; &nbsp;  &nbsp;    Zip Code:4200<br> 
4.  Type of Event: <?php echo ucwords($row['eventCategory']) ?><br> 
5.  Date of Event: <?php echo ucwords($row['dateReserved']) ?> <br>   Start Time:  <?php echo ucwords($row['startTime']) .":00 " . $row['startFor']?>                <br>  End Time: <?php echo ucwords($row['endTime']) . ":00 " . $row['endTimeFor']; ?><br> 
6.  Scope of Work: It is hereby agreed to and understood that Fab Events – Events Management & Services, in exchange for remuneration as set forth in Paragraph 6 of this subject Agreement, Fab Events will provide the following services:

<br><br>


<?php 

echo ucfirst($row['eventInfo']);

?>

7.  The total event planning fee agreed upon is P30,000. A non – refundable reservation fee of 10,000 is required to secure Fab Events for the event. This amount shall be subtracted from the event planning fee. The remaining balance of the event planning fee must be paid in full BEFORE the start of your event ( unless other arrangements are accepted by Fab Events). Any payments received less than 2 weeks before the event must be by cash. Personal checks are accepted up to 2 weeks before the event. All checks shall be made payable to Rose Ann Mendoza.
<br> <br>
8.  Fab Events represents and warrants to Client that it has the experience and ability to perform the services required by this Agreement; that it will perform said services in a professional, competent and timely manner; that it has the power to enter into and perform this Agreement; and that is performance of this Agreement shall not infringe upon or violate the rights of any third party or violate any federal, state and municipal laws. However, Client will not determine or exercise control as to general procedures or formats necessary to have these services meet Client’s satisfaction. 

<br> <br>

9.  In case of unpredictable weather conditions (such us: Typhoon, Heavy Rains, Floods, etc.) Fab Events will not entertain sudden changes in our contract since we have already purchased all the ingredients needed based on the packaged you chosen. Otherwise you will be charged accordingly.

<br> <br>

10. In the event of non- payment, Fab Events retain the right to attempt collection through all legal and permissible means. Client will be responsible for all court fees, legal fees, and collection costs incurred by Fab Events.
<br> <br>

11. Overtime Fee of Php75.00 per hour for all catering personnel on duty (i.e Waiters, Driver, Manager on duty, etc.) in excess of contracted time and Php75,00 per waiter per level if the function area / Building has no service elevator.
<br> <br>

12. This agreement cannot be cancelled except by mutual written consent of both the Client and Fab Events. If cancellation is initiated by the Client in writing and agreed to by Fab Events writing, Client will be required t0 pay any unrecoverable costs already incurred by Fab Events (but not more than the total fee agreed upon.)
<br> <br>

13. Client shall pay any charges imposed by the venue. These charges may include, but are not limited to, parking, use of electric power, etc.
<br> <br>

14. Client may not transfer this contract to another party without the prior written consent of Fab Events.
<br> <br>

15. This agreement is not binding until received and signed by Fab Events. Any changes must be written and signed by both the Client and Fab Events. Oral agreements are 
non – binding. The latest contract supersedes all previous contracts between Client and Fab Events for the event listed above.
<br> <br>

16. For out of town event, transportation fee will be charged accordingly.
<br> <br>

17. Ant losses, breakages, gate entrance fee, parking fee, and caterer’s bond at the venue will be charged to our client.
<br> <br>

18. Surcharge of Php5,ooo for rebooking /  change of event date seven (7) days prior to the original event date.
<br> <br>

19. Customer has the option of keeping any extra food remaining after the initial cater service is over. The client is responsible for providing own food storage containers. Fab Events is no longer responsible for leftovers after the initial 3 hour service nor any consequences due to its later consumption.
<br> <br>

20. Clients will be charged for loss / damage of the caterers equipment not due to handling by the food service personnel.
<br> <br>

21. Only the Clients and its authorized and its authorized representative will be allowed to discuss the details of the event.
<br> <br>

22. In the occasion that the number of guest exceeds what is expected, Fab Events usually makes a 20% allowance from he agreed number of guest to be served which will be charged accordingly to the client. (450 per plate)
<br> <br><br> <br>


<div class="row">
<div class="col-md-6">
Dated: <p><?php echo ucwords($row['dateReserved']) ?></p>
Fab Events <br>
Signed by: Rose Ann Barquilla – Mendoza <br>
Signed: ____________________ <br><br><br>

</div>

<div class="col-md-6">

Dated: <p><?php echo ucwords($row['dateReserved']) ?></p> 
Signed by: (client) <?php echo ucwords($fullName); ?><br>
Signed: ____________________

</div>

</div>


<br> <br><br> <br>



          </p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
               <button type="button" class="btn btn-info btn-sm" onclick="printContent('printTable')"><i class="fa fa-print"></i> Print Contract</button>
        </div>
      </div>
      
    </div>
  </div>
  
<script>
  $(document).ready(function(){
    $("#view").click();

  });


  function printContent(id){
str=document.getElementById(id).innerHTML
newwin=window.open('','printwin','left=100,top=100,width=1000,height=500');
newwin.document.write('<HTML>\n<HEAD>\n');
newwin.document.write('<center><img src="img/gallery/fav-logo.png" width="50%;"/>\n</center>\n');
newwin.document.write('<br>\n');
newwin.document.write('<script>\n');
newwin.document.write('function chkstate(){\n');
newwin.document.write('if(document.readyState=="complete"){\n');
newwin.document.write('window.close()\n');
newwin.document.write('}\n');
newwin.document.write('else{\n');
newwin.document.write('setTimeout("chkstate()",2000)\n');
newwin.document.write('}\n');
newwin.document.write('}\n');
newwin.document.write('function print_win(){\n');
newwin.document.write('window.print();\n');
newwin.document.write('chkstate();\n');
newwin.document.write('}\n');
newwin.document.write('<\/script>\n');
newwin.document.write('</HEAD>\n');
newwin.document.write('<BODY onload="print_win()">\n');
newwin.document.write(str);
newwin.document.write('</BODY>\n');
newwin.document.write('</HTML>\n');
newwin.document.close();
}






</script>