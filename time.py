import json
import time
import requests

def get_timestamp():
    url = "http://your-php-endpoint.com"
    response = requests.get(url)
    
    if response.status_code == 200:
        data = json.loads(response.text)
        return data['time']
    else:
        print("Failed to retrieve the timestamp.")
        return None

def set_rtc_timestamp(timestamp):
    # Assuming you have an RTC module connected to your SBC
    # Replace this with your actual RTC module's API
    rtc_timestamp = int(time.mktime(time.strptime(str(timestamp), "%Y-%m-%d %H:%M:%S")))
    # Set the RTC timestamp here
    print("RTC Timestamp set:", rtc_timestamp)

def main():
    timestamp = get_timestamp()
    
    if timestamp is not None:
       rtc_timestamp = set_rtc_timestamp(int(timestamp))
        
if __name__ == "__main__":
    main()