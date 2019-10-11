@section('title', 'Admin | Hello') 
@extends('layout.master_one') 
@section('content')


<style type="text/css">
  .my-error-class {
    color: red;
  }
  .my-valid-class {
    color: green;
  }

    {
      {
      -- 1701710729163 delivery contact=91-1246719500 --
    }
  }

  .input {
    color: black;
    font-weight: 100;
    font-size: 14px;
  }

  .control {

    width: 295px;
  }
  
 
</style>
<?php



function getregion($id)
{
    $getregion = DB::table('cwc_unitState')->select('stateCode')->where('state', $id)->first();

    return $getregion->stateCode;
}
?>

  @if(count($errors)>0)
  <div class="col-sm-12 col-sm-offset-2">
    <ul>
      @foreach($errors->all() as $errors)
      <li style="font-size: 14px;color: red;">{{$errors}}</li>
      @endforeach
    </ul>
  </div>
  @endif
  <div class="col-sm-12">

    @if (Session::has('msg'))

    <div class="alert alert-danger" style="margin-top: 20px;
    text-align: center;">{{ Session::get('msg') }} </div>
    @endif

    <div class="panel panel-default no-bd">
      <div class="panel-header bg-dark">
        <h2 class="panel-title"><strong>Create</strong> Party</h2>
      </div>
      <div class="panel-body bg-white">
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <form role="form" method="post" action="{{url('insert')}}" name="myForm">

              <input type="hidden" name="_token" value="{{csrf_token()}}">

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Party Type</label>
                    <div class="append-icon">
                      <select class="form-control" id="partyType" name="partyTypes">
                        <option value="">-- Choose One--</option>
                   <option value="Customer" @if(old('partyTypes') == 'Customer')selected @endif>Customer</option>
                   <option value="Vendor" @if(old('partyTypes') == 'Vendor')selected @endif>Vendor</option>
                       </select>
                      <span id="partyType_Error"></span>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Establishment Type</label>
                    <div class="append-icon">
                      <select id="partyEstablishmentCategory" class="control" name="partyEstablishmentCategory" required="true">
                        <option value="">-Select One of These-</option>
                        @foreach ($data['establishment_type'] as $key => $value)
                        <option value="{{$value->warehouse}}" @if(old('partyEstablishmentCategory') == $value->warehouse) selected @endif>{{$value->warehouse}}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group" id="party_text_category" style="display:none;">
                    <label class="control-label">Party Tax Category:</label>
                    <div class="append-icon">
                      <select id="partyType_tax" class="form-control" name="customercategory">
                         <option value="">-Select One of These-</option>
                         @foreach ($data['customer'] as $key => $value)
                                                  <option value="{{$value->partytaxcategory_id}}" @if(old('customercategory') == $value->partytaxcategory_id)selected @endif>{{$value->partytaxcategory_value}}</option>
                          @endforeach
                     </select>
                    </div>
                  </div>
                    <input type="hidden" id="get" name="_get" value="{{old('_get')}}">
                  <div class="form-group" id="party_text_vendor" style="display:none;">
                    <label class="control-label">Party Tax Vendor Category</label>
                    <div class="append-icon">
                      <select id="vendorcategory" class="form-control" name="vendorcategory">
                            <option value="">-Select One of These-</option>
                            @foreach ($data['vendor'] as $key => $value)
                                                  <option value="{{$value->partytaxcategory_vendorid}}" @if(old('vendorcategory') == $value->partytaxcategory_vendorid)selected @endif>{{$value->partytaxcategoryvendor_value}}</option>
                                         @endforeach
                        </select>
                    </div>
                  </div>

                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Legal Name in Block letters</label>
                    <div class="append-icon">
                        <input type="text" class="form-control" style="text-transform: uppercase" name="partyName" id="partyName" onKeyPress="return charonly(this, event)"
                        value="{{old('partyName')}}" > 
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">TDS Deductee Type</label>
                    <div class="option-group">
                      <select id="partyTDSDeducteeType" class="control" name="TDSDeducteeType" required="true" >

                        <option value="">--Select one of these--</option>
                        <option value="Artificial Juridical person" @if(old('TDSDeducteeType') == "Artificial Juridical person")selected @endif>Artificial Juridical person</option>

                        <option value="Association of Persons" @if(old('TDSDeducteeType') == "Association of Persons")selected @endif>Association of Persons</option>

                        <option value="Body of Individuals" @if(old('TDSDeducteeType') == "Association of Persons")selected @endif>Body of Individuals</option>

                        <option value="Company- Non-Resident" @if(old('TDSDeducteeType') == "Association of Persons")selected @endif>Company- Non-Resident</option>

                        <option value="Company-Resident" @if(old('TDSDeducteeType') == "Company-Resident")selected @endif>Company-Resident</option>

                        <option value="Cooperative Society" @if(old('TDSDeducteeType') == "Cooperative Society")selected @endif>Cooperative Society</option>

                        <option value="Government" @if(old('TDSDeducteeType') == "Government")selected @endif>Government</option>

                        <option value="Individual/HUF-Non Resident" @if(old('TDSDeducteeType') == "Individual/HUF-Non Resident")selected @endif>Individual/HUF-Non Resident</option>

                        <option value="Individual/HUF- Resident" @if(old('TDSDeducteeType') == "Individual/HUF- Resident")selected @endif>Individual/HUF- Resident</option>

                        <option value="Local Authority" @if(old('TDSDeducteeType') == "Local Authority")selected @endif>Local Authority</option>

                        <option value="Partnership Firm" @if(old('TDSDeducteeType') == "Partnership Firm")selected @endif>Partnership Firm</option>
                    </select>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Address</label>
                    <div class="append-icon">
                      <input type="text" class="form-control" id="Address1" name="Address1" path="Address1" value="{{old('Address1')}}">

                      <input type="text" class="form-control" id="Address2" name="Address2" value="{{old('Address2')}}">
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">City</label>
                    <div class="file">
                      <div class="option-group">
                          <input class="form-control" type="text" name="City" value="{{old('City')}}" style="text-transform: capitalize;">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="row">
                 
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">State</label>
                    <div class="append-icon">
                      <select id="state" class="control" path="state" name="state" required="true" style="text-transform: capitalize;">
                        <option value="">--Select One of These---</option>
                         @foreach ($data['state'] as $key => $value)
                        <option value="{{$value->state}}" @if(old('state') == $value->state)selected @endif>{{$value->state}}</option>
                        @endforeach
                    </select>
                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Country</label>
                    <div class="append-icon">
                      <select id="country" class="form-control" name="country" style="text-transform: capitalize;">

                        <option value="India" selected @if(old('country') == 'India')selected @endif>India</option>
                    </select>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Pincode</label>
                    <div class="append-icon">
                      <input type="text" class="form-control" id="pincode" path="pincode" onKeyPress="return numbersonly(this, event)" name="pincode"
                        value="{{old('pincode')}}" maxlength="6" minlength="6"></input>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Office Phone Number</label>
                    <input class="form-control" id="officePhoneNumber" type="text" name="officePhoneNumber" onKeyPress="return numbersonly(this, event)"
                           maxlength="10" minlength="10" value="{{old('officePhoneNumber')}}"></input>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Authorised Representative Name</label>
                    <div class="option-group">

                      <input type="text" class="form-control"  id="authorisedSignatory" name="authorisedSignatory" onKeyPress="return charonly(this, event)"
                        value="{{old('authorisedSignatory')}}" ></input>

                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Contact Phone Number</label>
                    <div class="option-group">

                      <input class="form-control" type="text" id="contactNumber" name="contactNumber" onKeyPress="return numbersonly(this, event)"
                             maxlength="10" minlength="10" value="{{old('contactNumber')}}"></input>

                    </div>
                  </div>
                </div>
              </div>


              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Authorised Representative Email</label>
                    <input type="email" class="form-control" id="authorisedEmail" name="authorisedEmail" value="{{old('authorisedEmail')}}" style="text-transform: capitalize;"></input>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Aadhar No. of Authorized Representative</label>
                    <div class="option-group">

                      <input type="text" class="form-control" id="adhar_no" name="aadharNumber" maxlength="14" minlength="14" onkeyup="adhar_Val(this.value)"
                        onKeyPress="return numbersonly(this, event)" value="{{old('aadharNumber')}}"></input>
                      <label for="showing_adhar_img" class="showing_adhar_error text-danger"></label>
                    </div>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">PAN No.</label>
                    <input type="text" class="form-control" name="panNumber" id="panNumber" maxlength="10" size="30" onkeyup="Pan_Val(this.value);"
                      style="text-transform: uppercase"  value="{{old('panNumber')}}">
                    <label for="showing_pan_img" class="showing_pan_error text-danger"></label><br />
                    <label for="showing" class="dublicate_pan_error text-danger"></label>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">TAN No.</label>
                    <div class="option-group">

                      <input type="text" name="tanNumber" id="tanNumber"  class="form-control textupper" onkeyup="Tan_Val(this.value);" 
                             maxlength="10" value="{{old('tanNumber')}}" style="text-transform: uppercase">

                      <label for="showing_tan_img" class="showing_tan_img text-danger"></label>
                      <label for="showing_tan_img" class="dublicate_tan_error text-danger"></label>

                    </div>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">State of GST registration</label>
                    <select id="stateofGstRegistration" class="control" name="stateofGstRegistration" data-live-search="true" style="text-transform: capitalize;">
                        <option value="">--Select One of These---</option>
                         @foreach ($data['state'] as $key => $value)
                        <option value="{{$value->state}}" @if(old('stateofGstRegistration') == $value->state)selected @endif >{{ucfirst($value->state)}}</option>
            @endforeach

            </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">GSTIN No.</label>
                    <div class="option-group">
                        <input type="text" name="gstinNumber" id="gstinNumber" class="form-control" style="text-transform: uppercase" onkeyup="Gst_Val(this.value);" 
                        value="{{old('gstinNumber')}}">
                      <label for="showing_gst_img" class="showing_gst_img text-danger"></label>
                      <label for="showing_gst_img" class="showing_gst_error text-danger"></label>

                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">GST Registration Type</label>
                    <div class="option-group">

                      <select id="gstRegistrationType" class="control" name="gstRegistrationType">
                            <option value="">--Select One--</option>
                            <option value="Regular" @if(old('gstRegistrationType') == 'Regular')selected @endif >Regular</option>
                            <option value="Composition" @if(old('gstRegistrationType') =='Composition' )selected @endif >Composition</option>
                            <option value="Consumer" @if(old('gstRegistrationType') == 'Consumer')selected @endif >Consumer</option>
                        </select>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Bank Name</label>
                    <select id="bank" class="control" name="bank_name" style="text-transform: capitalize;">
                        <option value="">
                            --Select One of These---
                        </option>
                         @foreach($data['banks'] as $key =>$value)
                        <option schoolC="{{$value->ifsccode}}" value="{{$value->bank_name}}" @if(old('bank_name') ==$value->bank_name )selected @endif >{{ucfirst($value->bank_name)}}</option>
                        @endforeach
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Bank Branch Address</label>
                    <div class="option-group">

                      <input type="text" class="form-control" name="bnkbranch_name" id="bankaddress" value="{{old('bnkbranch_name')}}" style="text-transform: capitalize;">

                    </div>
                  </div>
                </div>

              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Bank A/c No</label>
                    <input type="text" name="bankAccNumber" id="bankAccNumber" class="form-control" onKeyPress="return numbersonly(this, event)"
                           value="{{old('bankAccNumber')}}" minlength="9"  maxlength="16"/>
                    <label for="showing" class="showing_account_error text-danger"></label>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Account Type</label>
                    <div class="option-group">
                      <select id="accountType" class="control" name="accountType">
                            <option value="">--Select account Type--</option>
                            <option value="savings" @if(old('accountType') =='savings' )selected @endif>Savings Account</option>
                            <option value="current" @if(old('accountType') =='current' )selected @endif>Current Account</option>
                        </select>
                      <label for="showing_gst_img" class="text-danger"></label>

                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">IFSC Code</label>
                    <div class="option-group">

                        <input type="text" name="ifscCode" id="ifscCode" class="form-control" minlength="11" maxlength="11" value="{{old('ifscCode')}}" />

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">CWC RO(Respective States)</label>

                    <?php $get = session()->get('profile');
                    $get_region = explode(',', $get->cwcregion);
                    ?>
                    <?php $usertype = session()->get('profile');?>
                    <select class="form-control cwcRegion" name="cwcRegion" data-live-search="true" style="text-transform: capitalize;">
                       <option value="">--Select One--</option>
                       <?php if ($usertype->type == 'ADMIN') {
                        ?>

                @foreach ($data['respectivestate'] as $key => $value)
      <option value="{{$value->state}}" @if(old('cwcRegion') ==$value->state )selected @endif>{{ucfirst($value->state)}}</option>
            @endforeach
                    <?php } elseif ($usertype->type == 'APPROVER') { ?>

              @foreach ($get_region as $value)
            <option statecode="<?php echo getregion($value) ?>" value='{{$value}}' @if(old('cwcRegion') ==$value )selected @endif>{{ucfirst($value)}}</option>
                @endforeach
                    <?php } else {?>
                      @foreach ($get_region as $value)
<option statecode="<?php echo getregion($value) ?>" value='{{$value}}' @if(old('cwcRegion') ==$value )selected @endif>{{ucfirst($value)}}</option>
                     @endforeach

                   <?php } ?>

            </select>

                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">CWC Unit Name</label>
                    <div class="option-group">
                      <select id="unitName" class="form-control" name="cwcUnitName" style="text-transform:capitalize;">
                      <option value="" >--Select Unit Name--</option>
                   </select>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group" id="v_vendor_selection" style="display:none;">
                    <label class="control-label">Services purchased </label>
                    <div class="option-group">
                      <select id="servicesSoldByvendor" name="servicesSoldByvendor[]" class="control" multiple="multiple">
                            <option value="">Select one of These--</option>
                            @foreach ($data['servicesoldbyvendor'] as $key => $value)
                            <option value="{{$value->servicevendor_id}}" @if(old('servicesSoldByvendor') ==$value->servicevendor_id)selected @endif>{{$value->servicevendor_value}}</option>
                            @endforeach
                        </select>

                    </div>
                  </div>

                  <div class="form-group" id="m_customer_selection" style="display:none;">
                    <label class="control-label">Services sold </label>
                    <div class="option-group">
                      <select id="servicesSoldByCwc" name="servicesSoldByCwc[]" class="control" aria-invalid="false" multiple="multiple">
                            <option value="">Select one of These--</option>
                           @foreach ($data['servicesoldbycwc'] as $key => $value)
                            <option value="{{$value->servicesoldbycwc_id}}"  @if(old('servicesSoldByCwc') ==$value->servicesoldbycwc_id)selected @endif>{{$value->value}}</option>
                            @endforeach
                                </select>

                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Credit Days</label>
                    <input name="creditDays" type="text" class="form-control" id="creditDays" onKeyPress="return numbersonly(this.event)" value="{{ old('creditDays') }}">
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Credit Limit(In Rupees)</label>
                    <div class="option-group">

                      <input name="creditLimit" type="text" class="form-control" id="creditLimit" onKeyPress="return numbersonly(this, event)"
                        value="{{old('creditLimit')}}" />

                    </div>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group" id="partyLedgerC" style="display: none;"> <!-- customer ledger--->
                    <label class="control-label">Customer Ledger Group</label>
                    <select name="partyLedger[]" id="customerledger" multiple="multiple" class="control">
                          @foreach ($data['customer_ldgr'] as $key => $value)
                        <option value="{{  $value->ledger_id}}" @if(old('partyLedger') ==$value->ledger_id)selected @endif>{{$value->ledger_value}}</option>
                        @endforeach
                    </select>
                  </div>

                  <div class="form-group" id="ledgervendor" style="display: none">
                    <label class="control-label">Vendor Ledger Group</label>
                    <select name="partyvendorLedger[]" id="partyvendorLedger" multiple="multiple" class="control">
                                 @foreach ($data['vendor_ldgr'] as $key => $value)
                                <option value="{{$value->vendorledger_id}}" @if(old('partyvendorLedger') == $value->vendorledger_id)selected @endif>{{$value->vendorledger_value}}</option>
                                @endforeach
                            </select>
                  </div>
                </div>

              </div>
              <input type="hidden" id="unitval" name="uunitval" value="{{old('uunitval')}}">
                <input type="hidden" id="unittext" name="uunitext" value="{{old('uunitext')}}">
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Any Default History</label>

                    <textarea name="anyDefaultHistory" style="text-transform: capitalize;" type="text" class="form-control" id="anyDefaultHistory" value="{{old('anyDefaultHistory')}}"
                    /></textarea>   
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="control-label">Any Other Information</label>
                    <div class="option-group">
                      <textarea style="text-transform: capitalize;" name="anyOtherInformation" type="text" class="form-control" id="anyOtherInformation" value="{{old('anyOtherInformation')}}"
                      /></textarea>

                    </div>
                  </div>
                </div>

              </div>

              <div class="row">

                <div class="col-sm-4">
                  <div class="form-group">

                    <input type="checkbox" id="creditWorthnessCheck" name="creditWorthnessCheck" value="1" style="width:18px;height:18px">
                    <label class="control-label">Credit Worthiness Checked</label>


                  </div>


                </div>

              </div>

              <div class="text-center m-t-20">
                <button type="submit" class="btn btn-embossed btn-primary" id="submit">Submit</button>

              </div>
            </form>
          </div>
        </div>
      </div>
    </div>

@stop 
@section('put_script_file')

    <script type="text/javascript" src="{{URL::asset('assets/js/jquery.validate.js')}}"></script>
  @include('include.master-one.js_scripts'); 
@stop 
@section('footerScript')
    <script type="text/javascript">
        
      $(function(){
          
          $("#partyName").keyup(function(){
              var getvalue  = $(this).val();
              if(getvalue.match(/[<>?@]/g)){
                  return false;
              }
              
          });
          
          
          
      var category = $("#get").val();
      
      if(category.length>0){
          
          if(category == 'Customer'){
              
             $("#party_text_category").show(); 
             $("#m_customer_selection").show(); 
             $("#partyLedgerC").show();
             $("#ledgervendor").hide();
             $("#party_text_vendor").hide();
             $("#v_vendor_selection").hide();
             
          }else{
              
              $("#party_text_vendor").show();
              $("#v_vendor_selection").show();
              $("#ledgervendor").show();
              $("#party_text_category").hide();
              $("#m_customer_selection").hide();
              $("#partyLedgerC").hide();
              
          }
      }
      // var party = $('#partyType :selected').val();
      // console.log(party);
  //$('#partyType :selected').val();
  $(function(){
      var party = $('#partyType :selected').val();
      // console.log(party);
   $("#partyType").bind('change',function(){
   
    var party = $("#partyType").val();
     
     $("#get").val(party);  // note remove it

     var getlength = party.length;
    if(getlength > 0){
     if(party == 'Customer'){
         $("#party_text_category").show();
         $("#party_text_vendor").hide();
         $("#v_vendor_selection").hide();
         $("#m_customer_selection").show();
         $("#ledgervendor").hide();
         $("#partyLedgerC").show();

  $("#bankAccNumber").attr("required", false);
  $("#ifscCode").attr("required", false);
  $("#accountType").attr("required", false);
  $("#partyType_tax").attr("required", true);
  $("#servicesSoldByCwc").attr("required", true);
  $("#customerledger").attr("required",true);
  $("#vendorcategory").attr("required", false);
  $("#servicesSoldByvendor").attr("required", false);
  $("#partyvendorLedger").attr("required", false);

    $("#vendorcategory").val('');
    $("#servicesSoldByvendor").val('');
    $("#partyvendorLedger").val('');
    }
  else if(party == 'Vendor'){
  $("#party_text_category").hide(); $("#party_text_vendor").show();
  $("#v_vendor_selection").show();
  $("#m_customer_selection").hide();
  $("#ledgervendor").show();
  $("#partyLedgerC").hide();

  $("#vendorcategory").attr("required",true);
  $("#servicesSoldByvendor").attr("required", true);
  $("#partyvendorLedger").attr("required", true);
  $("#partyType_tax").attr("required", false);
  $("#servicesSoldByCwc").attr("required", false);
  $("#customerledger").attr("required", false);

    $("#partyType_tax").val('');
    $("#servicesSoldByCwc").val('');
    $("#customerledger").val('');
  }
  
  } 
  });
});
   $("#vendorcategory").on('change',function(){
     var party = $("#partyType").val();

     var vendorcategory = $("#vendorcategory").val();
   if(party == 'Vendor' && vendorcategory == '3'){

   three();
   }
   if(party == 'Vendor' && vendorcategory == '1'){
   one();

   }
   if(party == 'Vendor' && vendorcategory == '2'){
   two();
   }

   });


  $("#partyType_tax").on('change',function(){
  var party = $("#partyType").val();
  var partyType_tax = $("#partyType_tax").val();
  if(party == 'Customer' && partyType_tax == '2'){
  four();
  }
  });
  $("#partyType_tax").on('change',function(){
  var party = $("#partyType").val();
  var partyType_tax = $("#partyType_tax").val();
  if(party == 'Customer' && partyType_tax == '1'){
  five_customer_two();
  }


  });

   $("#bank").on('change',function(){
      var code = $("#bank").find(':selected').attr('schoolC');
      $("#ifscCode").val(code);
      });

  ///endloadfunction.
  });

  function two(){
  var party = $("#partyType").val();
  var vendorcategory = $("#vendorcategory").val();
  if(party == 'Vendor' && vendorcategory == '2'){
  $("#gstinNumber").attr("required", false);
  $("#tanNumber").attr("required", false);
   $("#bank").attr("required", true);
      $("#bankaddress").attr("required", true);
      $("#bankAccNumber").attr("required", true);
      $("#accountType").attr("required", true);
      $("#ifscCode").attr("required", true);
  $("#panNumber").bind('keyup blur',function () {
   var thisVal = $(this).val();

    if (thisVal != null && thisVal != '' && thisVal.length ==10) {
    var ID = $(this).attr("id");
     var base_url = window.location.origin;
     var url = base_url + '/validate-pan';
     $.ajax({
         beforeSend: function (xhrObj) {
             xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
             xhrObj.setRequestHeader("Accept", '*/*');
         },
         type: "POST",
         url: url,
         data: { 'get_pan':thisVal },
         dataType: 'text',
         success: function (data) {
           console.log(data);
           if (data == 'ok') {
        $('.dublicate_pan_error').html('Pan No already exists');
  }
  else {
   $('.dublicate_pan_error').html('');
  }
  }
   });
  }
  });
  }
  else{
  $("#gstinNumber").attr("required", true);
  $("#panNumber").attr("required", true);
  $("#tanNumber").attr("required", true);
  }
  }

  $(".cwcRegion").on('change',function () {

      var thisVal = $(this).val();
      var ID = $(this).attr("id");
        var base_url = window.location.origin;
        var url = base_url + '/get_cwc_unitName';
        $.ajax({
           beforeSend: function (xhrObj) {
           xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
           xhrObj.setRequestHeader("Accept", '*/*');
       },
           type: "GET",
           url: url,   ///fetch distric on the state for tailor
           data: {'cwc_unit_name':thisVal},
           dataType: 'json',
           //dataType: 'text',
           success: function (data) {

           $("#unitName").empty();
           //console.log(data);
           
           if(data.length < 1){
               
               $("#unitName").append("<option>" + 'Data not Found' + "</option>");
           }

     for (var i = 0; i < data.length; i++) {

        $("#unitName").append("<option value='" + data[i].warehousecode + "' selected>" + data[i].warehouse + "</option>");
       }

    }
      });

    });

/// unit name
$("#unitName").on('change',function(){

   var gVal = $(this).val();
 
   var gtext = $("#unitName option:selected" ).text();

  $("#unitval").val(gVal);

    $("#unittext").val(gtext);
});

/// unit name

var gval = $("#unitval").val();

var unittext = $("#unittext").val();

if(gval.length > 0){

    var gtext = $("#unittext").val();
    
      $("#unitName").append('<option value='+ gval +' selected="selected">'+ unittext +'</option>');
}

  function one(){
    var party = $("#partyType").val();
    var vendorcategory = $("#vendorcategory").val();
  if(party == 'Vendor' && vendorcategory == '1'){

   $("#tanNumber").attr("required", false);
   $("#bank").attr("required", true);
      $("#bankaddress").attr("required", true);
      $("#bankAccNumber").attr("required", true);
      $("#accountType").attr("required", true);
      $("#ifscCode").attr("required", true);
   $("#stateofGstRegistration").attr("required", true);
   $("#gstRegistrationType").attr("required", true);

   //$("#gstinNumber").bind('keyup blur',function () {
                  var thisVal = $("#gstinNumber").val();
                 var cwcregion = $(".cwcRegion").val();
                  if (thisVal != null && thisVal != '') {
                   var base_url = window.location.origin;
                   var url = base_url + '/validate-gst';
                  $.ajax({
              beforeSend: function (xhrObj) {
              xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
              xhrObj.setRequestHeader("Accept", '*/*');
          },
                      type: "GET",
                      url: url,
                      data: { 'get_gst':thisVal ,'cwcregion':cwcregion},
                      dataType: 'json',
                      success: function (data) {
                         if($.isEmptyObject(data)){
                              $('.showing_gst_error').html('');
                      } else {

                       $('.showing_gst_error').html('GST No already  exists in '+ data.cwcRegion);

                      $("#tanNumber").attr("required", true);
                      return false;
             }

               }
                 });
               }

              // });
  }
  else{
  $("#gstinNumber").attr("required", true);
  $("#panNumber").attr("required", true);
  $("#tanNumber").attr("required", true);
  }
  }

  function three(){
    var party = $("#partyType").val();
    var vendorcategory = $("#vendorcategory").val();

     if(party == 'Vendor' && vendorcategory == '3'){

      $("#gstinNumber").attr("required", false);
      $("#panNumber").attr("required", false);
      $("#tanNumber").attr("required", false);
      $("#stateofGstRegistration").attr("required", false);
      $("#gstRegistrationType").attr("required", false);
      $("#bank").attr("required", true);
      $("#bankaddress").attr("required", true);
      $("#bankAccNumber").attr("required", true);
      $("#accountType").attr("required", true);
      $("#ifscCode").attr("required", true);

      $("#bankAccNumber").bind('keyup blur',function () {
          
          var thisVal = $(this).val();
          if (thisVal != null && thisVal != '' && thisVal.length > 5) {
         var ID = $(this).attr("id");
          var base_url = window.location.origin;
          var url = base_url + '/validate-account';
          $.ajax({
              beforeSend: function (xhrObj) {
                  
                  xhrObj.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                  xhrObj.setRequestHeader("Accept", '*/*');
              },
              type: "get",
              url: url,
              data: { 'get_acount':thisVal },
              dataType: 'text',
              success: function (data) {

                if (data == 'ok') {
             $('.showing_account_error').html('Account already exists');
             $("#tanNumber").attr("required", true);
      }
      else {
        $('.showing_account_error').html('');
        $("#tanNumber").attr("required", false);
      }
      }
        });
      }
      });
    }

  else{
    $("#gstinNumber").attr("required", true);
    $("#panNumber").attr("required", true);
    $("#tanNumber").attr("required", true);
    $("#stateofGstRegistration").attr("required", true);
    $("#gstRegistrationType").attr("required", true);
    $("#bank").attr("required", false);
    $("#bankaddress").attr("required", false);

  }
  }


  function four(){
    var party = $("#partyType").val();
    var partyType_tax = $("#partyType_tax").val();
  if(party == 'Customer' && partyType_tax == '2'){
  $("#gstinNumber").attr("required", false);
  $("#tanNumber").attr("required", false);

  }else{
  $("#gstinNumber").attr("required", true);

  }
  }

  function five_customer_two(){
    var party = $("#partyType").val();
    var partyType_tax = $("#partyType_tax").val();
  if(party == 'Customer' && partyType_tax == '1'){
  $("#gstinNumber").attr("required", true);

  $("#stateofGstRegistration").attr("required", true);
  $("#gstinNumber").attr("required", true);
  $("#gstRegistrationType").attr("required", true);
  $("#tanNumber").attr("required", false);

  }else{
  $("#gstinNumber").attr("required", true);

  }
  }
    </script>








    
@stop