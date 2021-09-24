<div class="row">
            <div class="col-md-1"></div>
            <div class="col-md-10 create" style="border:1px solid red">
                <form action="#" method="POST" enctype="multipart/form-data" autocomplete="off" style="padding:5px">
                    <div class="error-text" style="color:red;text-align:center"></div>
                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>Terminal ID</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="terminalid" placeholder="Enter unique terminal id here" required>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Vender</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="vender" id="vender" onchange="update()">
                                            <option value=""></option>
                                            <option value="epic">EPIC Lanka</option>
                                            <option value="sits">SITS</option>
                                            <option value="cba">CBA</option>
                                            <option value="dms">DMS</option>
                                            <option value="inter">Interblocks</option>
                                            <option value="other">Other</option>

                                        </select>
                                    </div>
                                </div>
                                
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Model</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="model" id="model">
                                            <option value=""></option>
                                            <option value="vx510" id="epic1">VX 510</option>
                                            <option value="vx520" id="epic2">VX 520</option>
                                            <option value="vx520c" id="epic3">VX 520C</option>
                                            <option value="t1000" id="csits">T1000</option>
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="">Type</label>
                                    </div>
                                    <div class="col-md-8">
                                        <select name="type" id="type">
                                            <option value=""></option>
                                            <option value="gprs">GPRS</option>
                                            <option value="pstn">PSTN</option>
                                            <option value="ip">IP</option>    
                                        </select>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>Serial Number</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="serialno" placeholder="Enter Serial no here" required>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>MCC</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="4" class="form-control" name="mcc" placeholder="Enter MCC here" required>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>Merchant Number</label>
                            </div>
                            <div class="col-md-8">
                                <input type="number" oninput="javascript: if (this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);" maxLength="7" class="form-control" name="merchantno" placeholder="Enter Merchant no here" required>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>NFC Availability</label>
                            </div>
                            <div class="col-md-8">
                                <select name="nfc" id="nfc">
                                    <option value=""></option>
                                    <option value="yes">Yes</option>
                                    <option value="no">No</option>
                                </select>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>Legal Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="lname" class="form-control" placeholder="Enter legal name here" required>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>Commercial Name</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="cname" class="form-control" placeholder="Enter Commercial Name here" required>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>Address</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="address" class="form-control" placeholder="Enter Address here" required>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>City</label>
                            </div>
                            <div class="col-md-8">
                                <input type="text" name="city" class="form-control" placeholder="Enter City here" required>
                            </div>
                        </div>

                        <div class="row" style="margin:5px 0">
                            <div class="col-md-4">
                                <label>District</label>
                            </div>
                            <div class="col-md-8">
                                <select name="district" id="district">
                                    <option value=""></option>
                                    <option value="ampara">Ampara</option>
                                    <option value="anuradhapura">Anuradhapura</option>
                                    <option value="anuradhapura">Colombo</option>

                                </select>
                            </div>
                        </div>

            
                        <div class="row" style="text-align:center;margin:5px 0">
                            <div class="field button">
                                <input type="submit" class="btn btn-outline-primary" name="submit" value="Create Terminal">
                            </div>
                        </div>
                        
                </form>

            </div>
            <div class="col-md-1"></div>

            
    </div>