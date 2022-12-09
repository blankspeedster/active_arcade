using System;
using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using System.Net.Http;
using System.Net.Http.Headers;
using TMPro;

public class WristHandController : MonoBehaviour
{
    public GameObject colliderBottom, colliderLeft, colliderRight;
    public TMP_Text typeOfHand;
    // Start is called before the first frame update
    void Start()
    {
        InvokeRepeating("CheckHandStatus",0.5f, 0.5f);
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    void leftHandColliders(){
        colliderLeft.SetActive(false);
        colliderRight.SetActive(true);
    }

    void rightHandColliders(){
        colliderLeft.SetActive(true);
        colliderRight.SetActive(false);
    }

    public async void CheckHandStatus()
    {
        Debug.Log("Sample");
        string baseURL = PlayerPrefs.GetString("url");

        string message = null;

        string url = "http://localhost:8888/active_arcade/home/status.php";

        var client = new HttpClient();
        var request = new HttpRequestMessage
        {
            Method = HttpMethod.Post,
            RequestUri = new Uri(url),
            Headers =
            {
                { "Accept", "application/json" },
            },
            Content = new StringContent("")
            {
                Headers =
                {
                    ContentType = new MediaTypeHeaderValue("application/json")
                }
            }
        };
        using (var response = await client.SendAsync(request))
        {
            response.EnsureSuccessStatusCode();
            var body = await response.Content.ReadAsStringAsync();
            message = body;
        }

        // Debug.Log(message);
        typeOfHand.text = message;

        if(message == "Left"){
            leftHandColliders();
        }
        else if(message == "Right"){
            rightHandColliders();
        }
    }

}
