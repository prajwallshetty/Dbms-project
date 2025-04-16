<div class="form-row">
    <div class="form-group col-lg-12">
        <div class="custom_select">
            <select class="form-control select-active" name="country" id="country">
                <option value="">Choose a option...</option>
                <option value="AX" {{$billingDetails && $billingDetails->country == 'AX' ? 'selected' : ''}}>1</option>
                <option value="AF" {{$billingDetails && $billingDetails->country == 'AF' ? 'selected' : ''}}>2</option>
                <option value="AL" {{$billingDetails && $billingDetails->country == 'AL' ? 'selected' : ''}}>3</option>
                <option value="DZ" {{$billingDetails && $billingDetails->country == 'DZ' ? 'selected' : ''}}>4</option>
                <option value="AD" {{$billingDetails && $billingDetails->country == 'AD' ? 'selected' : ''}}>5</option>
                <option value="AO" {{$billingDetails && $billingDetails->country == 'AO' ? 'selected' : ''}}>6</option>
                <option value="AI" {{$billingDetails && $billingDetails->country == 'AI' ? 'selected' : ''}}>7</option>
                <option value="AQ" {{$billingDetails && $billingDetails->country == 'AQ' ? 'selected' : ''}}>8</option>
                <option value="AG" {{$billingDetails && $billingDetails->country == 'AG' ? 'selected' : ''}}>9</option>
                <option value="AR" {{$billingDetails && $billingDetails->country == 'AR' ? 'selected' : ''}}>10</option>
                <option value="AM" {{$billingDetails && $billingDetails->country == 'AM' ? 'selected' : ''}}>11</option>
                <option value="AW" {{$billingDetails && $billingDetails->country == 'AW' ? 'selected' : ''}}>12</option>
                <option value="AU" {{$billingDetails && $billingDetails->country == 'AU' ? 'selected' : ''}}>13</option>
                <option value="AT" {{$billingDetails && $billingDetails->country == 'AT' ? 'selected' : ''}}>14</option>
                <option value="AZ" {{$billingDetails && $billingDetails->country == 'AZ' ? 'selected' : ''}}>15</option>
            </select>
        </div>
    </div>
</div>

