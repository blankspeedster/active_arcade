using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class ColissionWristA : MonoBehaviour
{   
    public GameObject checkerTopRight, checkerTopLeft, checkerLeft, checkerRight; 
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
        //If right hand, right collider is hit
        if(collision.collider.name == "colliderCheckerRight")
        {
            int score = PlayerPrefs.GetInt("wristScore");
            score = score + 1;
            PlayerPrefs.SetInt("wristScore", score);
            checkerRight.SetActive(false);
            checkerTopRight.SetActive(true);
        }

        //If right hand, right collider is hit
        if(collision.collider.name == "colliderCheckerTopA")
        {
            int score = PlayerPrefs.GetInt("wristScore");
            score = score + 1;
            PlayerPrefs.SetInt("wristScore", score);
            checkerTopRight.SetActive(false);
            checkerRight.SetActive(true);          
        }

        //If left hand, left collider is hit
        if(collision.collider.name == "colliderCheckerLeft")
        {
            int score = PlayerPrefs.GetInt("wristScore");
            score = score + 1;
            PlayerPrefs.SetInt("wristScore", score);
            checkerLeft.SetActive(false);
            checkerTopLeft.SetActive(true);
        }
        //If left hand, right collider is hit
        if(collision.collider.name == "colliderCheckerTopB")
        {
            int score = PlayerPrefs.GetInt("wristScore");
            score = score + 1;
            PlayerPrefs.SetInt("wristScore", score);
            checkerTopLeft.SetActive(false);
            checkerLeft.SetActive(true);          
        }



    }

}
