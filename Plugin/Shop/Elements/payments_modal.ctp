<div class="modal fade" id="addmoney" tabindex="-1" role="dialog" aria-labelledby="addmoneyLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="<?= $Lang->get('GLOBAL__CLOSE') ?>"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel"><?= $Lang->get('SHOP__ADD_MONEY') ?></h4>
      </div>
      <div class="modal-body">
          <div class="alert alert-info"><b>Information :</b> Pour les paiements via PaySafeCard rendez-vous TeamSpeak.</div>
        <?php if($isConnected AND $Permissions->can('CREDIT_ACCOUNT')) { ?>
          <?php if(!empty($dedipass)) { ?>
            <a class="btn btn-success btn-block" href="<?= $this->Html->url(array('controller' => 'payment', 'action' => 'dedipass')) ?>">Dedipass</a>
          <?php } ?>
          <?php if(!empty($paypal_offers)) { ?>
            <a class="btn btn-success btn-block" data-toggle="collapse" href="#PayPal" aria-expanded="false" aria-controls="PayPal" style="margin-bottom: 5px;">PayPal</a>
            <div class="collapse" id="PayPal">
              <form action="https://www.paypal.com/cgi-bin/webscr" method="post">
                <input name="currency_code" type="hidden" value="EUR" />
                <input name="shipping" type="hidden" value="0.00" />
                <input name="tax" type="hidden" value="0.00" />
                <input name="return" type="hidden" value="<?= $this->Html->url(array('controller' => 'shop', 'action' => 'index', 'return'), true) ?>" />
                <input name="cancel_return" type="hidden" value="<?= $this->Html->url(array('controller' => 'shop', 'action' => 'index', 'error'), true) ?>" />
                <input name="notify_url" type="hidden" value="<?= $this->Html->url(array('controller' => 'payment', 'action' => 'ipn'), true) ?>" />
                <input name="cmd" type="hidden" value="_xclick" />

                <input name="business" id="mail_paypal" type="hidden" value="<?= $paypal_offers[0]['Paypal']['email'] ?>" />

                <input name="item_name" type="hidden" value="Des <?= $plural_money ?> sur <?= $website_name ?>" />
                <input name="no_note" type="hidden" value="1" />
                <input name="lc" type="hidden" value="FR" />
                <input name="custom" type="hidden" value="<?= $user['id'] ?>">
                <input name="bn" type="hidden" value="PP-BuyNowBF" />

                <input type="hidden" name="cbt" value="<?= $Lang->get('SHOP__PAYPAL_RETURN_MSG', array('{WEBSITE_NAME}' => $website_name)) ?>">
                <input type="hidden" name="charset" value="UTF-8">

                <div class="form-group col-md-8">
                  <select class="form-control" onchange="{if(this.options[this.selectedIndex].onclick != null){this.options[this.selectedIndex].onclick(this);}}" name="amount" id="amount">
                    <?php foreach ($paypal_offers as $key => $value) { ?>
                      <option onClick="$('#mail_paypal').val('<?= $value['Paypal']['email'] ?>')" value="<?= $value['Paypal']['price'] ?>"><?= $value['Paypal']['name'] ?></option>
                    <?php } ?>
                  </select>
                </div>
                <button type="submit" class="btn btn-primary"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
              </form>
              <br>
            </div>
          <?php } ?>
          
Save New Duplicate & Edit Just Text 1
2
3
4
5
6
7
8
9
10
11
12
13
14
15
16
17
18
19
20
21
22
23
24
25
26
27
28
29
30
31
32
<?php if($paysafecard_enabled) { ?>
            <a class="btn btn-success btn-block" data-toggle="collapse" href="#PaySafeCard" aria-expanded="false" aria-controls="PaySafeCard">PaySafeCard</a>
            <br>
            <div class="collapse" id="PaySafeCard">
              <form class="form-inline" data-ajax="true" action="<?= $this->Html->url(array('controller' => 'payment', 'action' => 'paysafecard')) ?>">
                <div class="ajax-msg"></div>
                <div class="form-group" style="margin-right:20px;margin-top:-15px">
                  <label class="sr-only"><?= $Lang->get('SHOP__GLOBAL_AMOUNT') ?></label>
                  <div class="input-group">
                    <input type="text" class="form-control" name="amount" placeholder="XXX" maxlength="3" data-type="numbers" tabindex="1" style="width:60px;">
                    <div class="input-group-addon">€</div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="code1" placeholder="XXXX" tabindex="2" data-type="numbers" maxlength="4" style="width:60px;">
                </div>
                -
                <div class="form-group">
                  <input type="text" class="form-control" name="code2" placeholder="XXXX" tabindex="3" data-type="numbers" maxlength="4" style="width:60px;">
                </div>
                -
                <div class="form-group">
                  <input type="text" class="form-control" name="code3" placeholder="XXXX" tabindex="4" data-type="numbers" maxlength="4" style="width:60px;">
                </div>
                -
                <div class="form-group">
                  <input type="text" class="form-control" name="code4" placeholder="XXXX" maxlength="4" data-type="numbers" tabindex="5" style="width:60px;">
                </div>
                <button type="submit" class="btn btn-default pull-right"><?= $Lang->get('GLOBAL__SUBMIT') ?></button>
              </form>
            </div>
          <?php } ?>
          <?= $Module->loadModules('shop_payments_modal') ?>
        <?php } else { ?>
          <p><?= $Lang->get('USER__ERROR_MUST_BE_LOGGED') ?></p>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <a type="button" class="btn btn-success" data-dismiss="modal"><?= $Lang->get('GLOBAL__CLOSE') ?></a>
        </form>
      </div>
    </div>
  </div>
</div>
