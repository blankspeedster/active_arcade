using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ColissionWrist : MonoBehaviour
{   
    public GameObject checker;
    // Start is called before the first frame update
    void Start()
    {
        
    }

    // Update is called once per frame
    void Update()
    {
        
    }

    void OnCollisionEnter(Collision collision)
    {
        if(collision.collider.name == "colliderChecker")
        {
            int score = PlayerPrefs.GetInt("wristScore");
            score = score + 1;
            PlayerPrefs.SetInt("wristScore", score);
            checker.SetActive(false);
            Invoke("ShowChecker", 2.0f);
        }
    }

    void ShowChecker()
    {
        checker.SetActive(true);
    }
}
