#!/usr/bin/python3

from boxsdk import JWTAuth
from boxsdk import Client

sdk = JWTAuth.from_settings_file('./38487735_v17qtrdu_config.json')
client = Client(sdk)

user = client.user(user_id='3259416447')

folder = client.as_user(user).folder(folder_id='60296293241')
triggers = ['FILE.UPLOADED']
url = 'https://stugs.com/repengine/process.php'
webhook = client.as_user(user).create_webhook(folder, triggers, url)
webhooks = client.as_user(user).get_webhooks()
