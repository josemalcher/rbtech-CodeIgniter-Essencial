<?php $this->load->view('header'); ?>
	<div id="contents">
		<div class="section">
			<h1>Contact</h1>
			<p>
				You can replace all this text with your own text. Want an easier solution for a Free Website? Head straight to Wix and immediately start customizing your website! Wix is an online website builder with a simple drag & drop interface, meaning you do the work online and instantly publish to the web. All Wix templates are fully customizable and free to use. Just pick one you like, click Edit, and enter the online editor.
			</p>
            <div>
            <?php

                if($formerror):
                    echo '<p>'.$formerror.'</p>';
                endif;
                echo form_open('pagina/contact');
                echo form_label('Seu nome:', 'nome');
                echo form_input('nome', set_value('nome'));
                echo '<br>';
                echo form_label('Email:', 'email');
                echo form_input('email', set_value('email'));
                echo '<br>';
                echo form_label('Assunto:', 'assunto');
                echo form_input('assunto', set_value('assunto'));
                echo '<br>';
                echo form_label('Mensagem:', 'mensagem');
                echo form_textarea('mensagem', set_value('mensagem'));
                echo form_submit('enviar', 'Enviar Mensagem >>', array('class'=> 'botao'));

                echo form_close();

            ?>
            </div>
			<!--<form action="">
				<input type="text" value="Name" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input type="text" value="Email" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<input type="text" value="Subject" onFocus="this.select();" onMouseOut="javascript:return false;"/>
				<textarea></textarea>
				<input type="submit" value="Send"/>
			</form>-->
		</div>
		<div class="section contact">
			<p>
				For Inquiries Please Call: <span>877-433-8137</span>
			</p>
			<p>
				Or you can visit us at: <span>ZeroType<br> 250 Business ParK Angel Green, Sunville 109935</span>
			</p>
		</div>
	</div>

<?php $this->load->view('footer'); ?>
