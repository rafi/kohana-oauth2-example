<div>
	<h2>Step 1 - User registration</h2>
	<form method="post" action="<?=$user_action_url ?>">
		<label for="username">Username:</label>
		<input type="text" name="username" id="username"/>

		<label for="username">Email:</label>
		<input type="text" name="email" id="email"/>

		<label for="password">Password:</label>
		<input type="password" name="password" id="password"/>

		<input type="submit" value="Create User"/>
	</form>
</div>
<div>
	<h2>Step 1 - Client registration</h2>
	<form method="post" action="<?=$client_action_url ?>">
		<label for="redirect_uri">Redirect URI:</label>
		<input type="text" name="redirect_uri" id="redirect_uri"/>

		<input type="submit" value="Create OAuth2 Keypair"/>
	</form>
</div>
<div>
	<h2>Step 3 - Authorize client's access to the user</h2>
	<form method="get" action="<?=$oauth_authorize_url ?>">
		<p><small>Save the code that appears in the redirected URL, then come back to this page</small></p>
		<p><small>Note: The code is only valid for 30 seconds or so! Be quick!</small></p>
		<label for="client_id">Client ID:</label>
		<input type="text" name="client_id" id="client_id"/>

		<label for="redirect_uri">Redirect URI:</label>
		<input type="text" name="redirect_uri" id="redirect_uri"/>

		<label for="response_type">Response Type:</label>
		<select name="response_type" id="response_type">
			<option>code</option>
			<option>token</option>
		</select>

		<input type="submit" value="Create OAuth2 Keypair"/>
	</form>
</div>
<div>
	<h2>Step 4 - Logout</h2>
	<p><small>Note: We do this so we can be sure that accessing the protected resource (which gets the user's details) is being done with only the auth code</small></p>
	<a href="<?=$logout_url ?>">Logout</a>
</div>
<div>
	<h2>Step 5 - Obtain Access Token</h2>

	<form method="post" action="<?=$oauth_token_url ?>">
		<p><small>Note: If you don't see JSON, or dont get asked to download a JSON file, an error occurred and your browser is hiding the error. Most likely your code has expired.</small></p>

		<label for="client_id">Client ID:</label>
		<input type="text" name="client_id" id="client_id"/>

		<label for="client_secret">Client Secret:</label>
		<input type="text" name="client_secret" id="client_secret"/>

		<label for="redirect_uri">Redirect URI:</label>
		<input type="text" name="redirect_uri" id="redirect_uri"/>

		<label for="grant_type">Grant Type:</label>
		<select name="grant_type" id="grant_type">
			<option>authorization_code</option>
			<option>refresh_token</option>
		</select>

		<div>
			<h3><em>Only for grant_type = authorization_code</em></h3>
			<label for="code">Code:</label>
			<input type="text" name="code" id="code"/>
		</div>

		<div>
			<h3><em>Only for grant_type = refresh_token</em></h3>
			<label for="refresh_token">Refresh Token:</label>
			<input type="text" name="refresh_token" id="refresh_token"/>
		</div>

		<input type="submit" value="Obtain Tokens"/>
	</form>
</div>
<div>
	<h2>Step 6 - Access a protected resource</h2>

	<form method="post" action="<?=$resource_url ?>">
		<label for="access_token">Acess Token:</label>
		<input type="text" name="access_token" id="access_token"/>

		<input type="submit" value="Access the resource"/>
	</form>
</div>
